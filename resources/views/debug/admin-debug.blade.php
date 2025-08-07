<!DOCTYPE html>
<html>
<head>
    <title>Laravel Admin Bookings Debug</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .test { background: #e3f2fd; padding: 15px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #1976d2; }
        .success { background: #e8f5e8; border-left-color: #4caf50; }
        .error { background: #ffebee; border-left-color: #f44336; }
        .warning { background: #fff3e0; border-left-color: #ff9800; }
        .info { background: #e1f5fe; border-left-color: #03a9f4; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; margin: 5px; }
        .btn:hover { background: #0056b3; }
        .btn-success { background: #28a745; }
        .btn-danger { background: #dc3545; }
        .btn-warning { background: #ffc107; color: #212529; }
        code { background: #f8f9fa; padding: 2px 5px; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Laravel Admin Bookings - Debug Center</h1>
        
        <div class="test info">
            <h3>📋 Current Status</h3>
            <p>You're getting 404 errors on <code>/admin/bookings</code>. This debug page will help us identify and fix the issue.</p>
        </div>
        
        <div class="test warning">
            <h3>⚠️ Known Issues</h3>
            <ul>
                <li>PsySH library has parse errors preventing artisan commands</li>
                <li>Route caching may be interfering with new routes</li>
                <li>Controller method calls may not be resolving properly</li>
            </ul>
        </div>
        
        <h2>🔧 Debug Test Suite</h2>
        
        <div class="test">
            <h3>Step 1: Basic Laravel Test</h3>
            <p>Test if Laravel routing is working at all:</p>
            <a href="/test" class="btn btn-success">Test Basic Route</a>
            <a href="/debug/full-test" class="btn btn-warning">Full System Test</a>
        </div>
        
        <div class="test">
            <h3>Step 2: Admin Route Tests</h3>
            <p>Test different admin booking route configurations:</p>
            <a href="/admin/bookings" class="btn">Direct Admin Bookings</a>
            <a href="/admin-bookings" class="btn btn-warning">Alternative Route</a>
            <a href="/debug/controller-test" class="btn btn-success">Controller Test</a>
        </div>
        
        <div class="test">
            <h3>Step 3: Component Tests</h3>
            <p>Test individual system components:</p>
            <a href="/debug/bookings" class="btn btn-warning">Database Test</a>
            <a href="/admin/status" class="btn">Status Page</a>
        </div>
        
        <div class="test success">
            <h3>✅ Expected Results</h3>
            <ul>
                <li><strong>/test</strong> - Should show "LARAVEL IS WORKING!" with timestamp</li>
                <li><strong>/admin/bookings</strong> - Should show booking management interface</li>
                <li><strong>/debug/full-test</strong> - Should show comprehensive system status</li>
                <li><strong>/debug/controller-test</strong> - Should show controller execution result</li>
            </ul>
        </div>
        
        <div class="test error">
            <h3>🔍 Troubleshooting Guide</h3>
            <p><strong>If /test doesn't work:</strong></p>
            <ul>
                <li>Laravel isn't running properly - check your web server</li>
                <li>URL rewriting isn't configured correctly</li>
                <li>You're accessing static files instead of Laravel</li>
            </ul>
            
            <p><strong>If /test works but /admin/bookings doesn't:</strong></p>
            <ul>
                <li>Route registration issue - check routes/web.php</li>
                <li>Controller loading problem - check AdminController</li>
                <li>View rendering issue - check admin.bookings_simple view</li>
            </ul>
        </div>
        
        <div class="test info">
            <h3>📝 Manual Testing Instructions</h3>
            <ol>
                <li>Click each test button above in order</li>
                <li>Note which ones work and which give 404 errors</li>
                <li>This will help identify exactly where the problem is</li>
                <li>Once we know the issue, we can apply the specific fix</li>
            </ol>
        </div>
        
        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🎯 Quick Solutions</h3>
            <p><strong>Most Common Fix:</strong> Make sure you're running Laravel through the proper entry point (not accessing static HTML files)</p>
            <p><strong>Alternative:</strong> Try accessing through different URL patterns if route conflicts exist</p>
            <p><strong>Fallback:</strong> Use the simplified routes that bypass the controller entirely</p>
        </div>
        
        <p><a href="/view_room" class="btn btn-danger">← Back to Room Management</a></p>
    </div>
</body>
</html>
