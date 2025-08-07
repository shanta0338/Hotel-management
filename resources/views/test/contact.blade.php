<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Contact Form Test</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-warning">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <select name="subject" class="form-control" required>
                    <option value="">Select a subject</option>
                    <option value="booking" {{ old('subject') == 'booking' ? 'selected' : '' }}>Room Booking Inquiry</option>
                    <option value="reservation" {{ old('subject') == 'reservation' ? 'selected' : '' }}>Reservation Management</option>
                    <option value="services" {{ old('subject') == 'services' ? 'selected' : '' }}>Hotel Services</option>
                    <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>Complaint or Issue</option>
                    <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                    <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Send Message</button>
            <a href="{{ route('contact_us') }}" class="btn btn-secondary">Go to Full Contact Page</a>
        </form>
    </div>
</body>
</html>
