<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        try {
            Log::info('Contact Us page loaded successfully');
        } catch (\Exception $e) {
            Log::error('Error loading Contact Us page: ' . $e->getMessage());
        }

        $user = Auth::user();
        return view('home.contact_us', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:5000',
            ]);

            // Create the contact record
            $contact = Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'user_id' => Auth::id(), // Will be null if user is not logged in
                'status' => 'new'
            ]);

            Log::info('Contact form submitted successfully', [
                'contact_id' => $contact->id,
                'user_id' => Auth::id(),
                'subject' => $validated['subject']
            ]);

            // Send email notification (optional - you can implement this later)
            try {
                // You can add email sending logic here
                // Mail::to('admin@hotel.com')->send(new ContactFormMail($contact));
            } catch (\Exception $e) {
                Log::warning('Failed to send email notification for contact form', [
                    'contact_id' => $contact->id,
                    'error' => $e->getMessage()
                ]);
            }

            return redirect()->route('contact_us')->with('success', 
                'Thank you for contacting us! Your message has been received and we will respond within 24 hours.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Contact form validation failed', [
                'errors' => $e->errors(),
                'user_id' => Auth::id()
            ]);
            
            return redirect()->route('contact_us')
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please check the form and try again.');

        } catch (\Exception $e) {
            Log::error('Error submitting contact form', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);

            return redirect()->route('contact_us')
                ->withInput()
                ->with('error', 'Sorry, there was an error processing your message. Please try again later.');
        }
    }

    // Admin method to view all contact messages
    public function adminIndex()
    {
        try {
            $contacts = Contact::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(20);

            return view('admin.contacts.index', compact('contacts'));
        } catch (\Exception $e) {
            Log::error('Error loading admin contacts: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error loading contacts.');
        }
    }

    // Admin method to view specific contact message
    public function show($id)
    {
        try {
            $contact = Contact::with('user')->findOrFail($id);
            
            // Mark as read if it's new
            if ($contact->isNew()) {
                $contact->markAsRead();
            }

            return view('admin.contacts.show', compact('contact'));
        } catch (\Exception $e) {
            Log::error('Error viewing contact: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Contact not found.');
        }
    }

    // Admin method to mark as replied
    public function markAsReplied($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->markAsReplied();

            return redirect()->back()->with('success', 'Contact marked as replied.');
        } catch (\Exception $e) {
            Log::error('Error marking contact as replied: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating contact.');
        }
    }
}
