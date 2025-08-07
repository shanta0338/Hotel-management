<!DOCTYPE html>
<html>
<head>
    <title>Laravel Route Debug</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .test { background: #e3f2fd; padding: 15px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #1976d2; }
        .success { background: #e8f5e8; border-left-color: #4caf50; }
        .error { background: #ffebee; border-left-color: #f44336; }
        .info { background: #fff3e0; border-left-color: #ff9800; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Laravel Route Debugging</h1>
        
        <div class="test info">
            <h3>Current URL Structure Issue</h3>
            <p>You're getting 404 errors because the routes aren't being found. This usually means:</p>
            <ul>
                <li>Laravel is not running through the proper entry point</li>
                <li>URL rewriting is not working correctly</li>
                <li>You're accessing static HTML files instead of Laravel</li>
            </ul>
        </div>
        
        <div class="test">
            <h3>📋 Testing Checklist</h3>
            <p><strong>1. First, test if Laravel is working:</strong></p>
            <ul>
                <li>Try: <a href="/test">/test</a> (should show current date/time)</li>
                <li>Try: <a href="/">/</a> (should load Laravel home page)</li>
            </ul>
            
            <p><strong>2. If above works, test admin routes:</strong></p>
            <ul>
                <li>Try: <a href="/admin/simple-test">/admin/simple-test</a></li>
                <li>Try: <a href="/admin/bookings">/admin/bookings</a></li>
                <li>Try: <a href="/admin-bookings">/admin-bookings</a> (alternative)</li>
            </ul>
        </div>
        
        <div class="test info">
            <h3>🛠️ Common Solutions</h3>
            <p><strong>If /test doesn't work:</strong></p>
            <ul>
                <li>Make sure you're running from the project root: <code>php artisan serve</code></li>
                <li>Or point your web server to the <code>public/</code> directory</li>
                <li>Check that mod_rewrite is enabled (for Apache)</li>
            </ul>
            
            <p><strong>If /test works but /admin/bookings doesn't:</strong></p>
            <ul>
                <li>There might be a route caching issue</li>
                <li>Controller class might not be loading properly</li>
            </ul>
        </div>
        
        <div class="test success">
            <h3>✅ Quick Fix Attempt</h3>
            <p>I've temporarily changed <code>/admin/bookings</code> to return simple text instead of using the controller.</p>
            <p>If this works, we know routing is fine and the issue is with the controller.</p>
        </div>
        
        <p><a href="/view_room">← Back to Rooms</a> | <a href="/admin/status">System Status</a></p>
    </div>
</body>
</html>
