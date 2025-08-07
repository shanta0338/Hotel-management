<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 600px; margin: 0 auto; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        button { background: #007bff; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .alert { padding: 15px; margin: 20px 0; border-radius: 5px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .error { color: #dc3545; font-size: 14px; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧪 Contact Form Functionality Test</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                <strong>✅ SUCCESS!</strong> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <strong>❌ ERROR!</strong> {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>❌ Validation Errors:</strong>
                <ul style="margin: 10px 0 0 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject">Subject *</label>
                <select id="subject" name="subject" required>
                    <option value="">Select a subject</option>
                    <option value="booking" {{ old('subject') == 'booking' ? 'selected' : '' }}>Room Booking Inquiry</option>
                    <option value="reservation" {{ old('subject') == 'reservation' ? 'selected' : '' }}>Reservation Management</option>
                    <option value="services" {{ old('subject') == 'services' ? 'selected' : '' }}>Hotel Services</option>
                    <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>Complaint or Issue</option>
                    <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                    <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('subject')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" rows="5" required placeholder="Enter your message here...">{{ old('message') }}</textarea>
                @error('message')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">🚀 Test Contact Form</button>
        </form>

        <hr style="margin: 40px 0;">
        
        <h3>📋 Form Test Checklist:</h3>
        <ul>
            <li>✅ All required fields have proper validation</li>
            <li>✅ Form action points to correct route: <code>{{ route('contact.submit') }}</code></li>
            <li>✅ CSRF token is included</li>
            <li>✅ Error handling and success messages are implemented</li>
            <li>✅ Old input values are preserved on validation errors</li>
        </ul>

        <p><strong>To test:</strong> Fill out the form and click submit. You should see a success message if everything works, or validation errors if fields are missing.</p>
        
        <p><a href="{{ route('contact_us') }}">&larr; Back to main contact page</a></p>
    </div>
</body>
</html>
