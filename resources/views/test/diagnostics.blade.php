<!DOCTYPE html>
<html>
<head>
    <title>Contact System Diagnostics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Contact System Diagnostics</h2>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>System Status</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Database Connection:</span>
                                <span class="badge bg-success">✓ Connected</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Contact Model:</span>
                                <span class="badge bg-{{ class_exists('App\Models\Contact') ? 'success' : 'danger' }}">
                                    {{ class_exists('App\Models\Contact') ? '✓ Available' : '✗ Missing' }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Contacts Table:</span>
                                @php
                                    try {
                                        \Schema::hasTable('contacts');
                                        $tableExists = true;
                                    } catch (Exception $e) {
                                        $tableExists = false;
                                    }
                                @endphp
                                <span class="badge bg-{{ $tableExists ? 'success' : 'danger' }}">
                                    {{ $tableExists ? '✓ Exists' : '✗ Missing' }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Messages:</span>
                                @php
                                    try {
                                        $contactCount = \App\Models\Contact::count();
                                    } catch (Exception $e) {
                                        $contactCount = 'Error';
                                    }
                                @endphp
                                <span class="badge bg-info">{{ $contactCount }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>New Messages:</span>
                                @php
                                    try {
                                        $newCount = \App\Models\Contact::where('status', 'new')->count();
                                    } catch (Exception $e) {
                                        $newCount = 'Error';
                                    }
                                @endphp
                                <span class="badge bg-warning">{{ $newCount }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Quick Links</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('contact_us') }}" class="btn btn-primary">
                                📝 Main Contact Form
                            </a>
                            <a href="{{ route('test.contact') }}" class="btn btn-outline-primary">
                                🧪 Test Contact Form
                            </a>
                            @if(Auth::check() && Auth::user()->usertype === 'admin')
                            <a href="{{ route('admin.contacts') }}" class="btn btn-success">
                                👨‍💼 Admin - View Messages
                            </a>
                            @endif
                            <a href="{{ route('homepage') }}" class="btn btn-secondary">
                                🏠 Back to Homepage
                            </a>
                        </div>
                    </div>
                </div>
                
                @if(Auth::check())
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>User Info</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>User Type:</strong> {{ Auth::user()->usertype ?? 'user' }}</p>
                    </div>
                </div>
                @else
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>Authentication</h5>
                    </div>
                    <div class="card-body">
                        <p>You are not logged in.</p>
                        <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-info">Register</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
