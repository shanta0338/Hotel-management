<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages Database Viewer</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; text-align: center; margin-bottom: 30px; }
        .stats { display: flex; gap: 20px; margin-bottom: 30px; }
        .stat-card { flex: 1; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; }
        .stat-number { font-size: 2rem; font-weight: bold; }
        .stat-label { font-size: 0.9rem; opacity: 0.9; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: bold; color: #333; }
        tr:hover { background: #f8f9fa; }
        .status-badge { padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; }
        .status-new { background: #ffeaa7; color: #d63031; }
        .status-read { background: #74b9ff; color: white; }
        .status-replied { background: #00b894; color: white; }
        .message-preview { max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .no-data { text-align: center; padding: 40px; color: #666; }
        .refresh-btn { background: #667eea; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-bottom: 20px; }
        .refresh-btn:hover { background: #5a6fd8; }
        .database-info { background: #e3f2fd; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .error { background: #ffebee; color: #c62828; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📧 Contact Messages Database</h1>
        
        <div class="database-info">
            <strong>📊 Database Table:</strong> <code>contacts</code><br>
            <strong>🗃️ Database Location:</strong> {{ config('database.connections.' . config('database.default') . '.database') }}<br>
            <strong>🔗 Connection:</strong> {{ config('database.default') }}
        </div>

        @php
            try {
                $totalContacts = \App\Models\Contact::count();
                $newContacts = \App\Models\Contact::where('status', 'new')->count();
                $readContacts = \App\Models\Contact::where('status', 'read')->count();
                $repliedContacts = \App\Models\Contact::where('status', 'replied')->count();
                $contacts = \App\Models\Contact::with('user')->orderBy('created_at', 'desc')->limit(50)->get();
                $hasError = false;
            } catch (\Exception $e) {
                $hasError = true;
                $errorMessage = $e->getMessage();
            }
        @endphp

        @if(isset($hasError) && $hasError)
            <div class="error">
                <strong>❌ Database Error:</strong> {{ $errorMessage }}<br>
                <small>Make sure you've run: <code>php artisan migrate</code></small>
            </div>
        @else
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number">{{ $totalContacts }}</div>
                    <div class="stat-label">Total Messages</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $newContacts }}</div>
                    <div class="stat-label">New Messages</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $readContacts }}</div>
                    <div class="stat-label">Read Messages</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $repliedContacts }}</div>
                    <div class="stat-label">Replied Messages</div>
                </div>
            </div>

            <button onclick="location.reload()" class="refresh-btn">🔄 Refresh Data</button>

            @if($contacts->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message Preview</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td><strong>#{{ $contact->id }}</strong></td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone ?: '—' }}</td>
                            <td>{{ ucfirst($contact->subject) }}</td>
                            <td class="message-preview" title="{{ $contact->message }}">{{ $contact->message }}</td>
                            <td>
                                @if($contact->user)
                                    <span style="color: #007bff;">{{ $contact->user->name }}</span>
                                @else
                                    <span style="color: #6c757d;">Guest</span>
                                @endif
                            </td>
                            <td>
                                <span class="status-badge status-{{ $contact->status }}">
                                    {{ ucfirst($contact->status) }}
                                </span>
                            </td>
                            <td>{{ $contact->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    <h3>📭 No Contact Messages Yet</h3>
                    <p>Submit the contact form to see messages appear here!</p>
                    <p><a href="{{ route('contact_us') }}">Go to Contact Form →</a></p>
                </div>
            @endif

            @if($contacts->count() == 50)
                <p style="text-align: center; color: #666; margin-top: 20px;">
                    <em>Showing latest 50 messages. Visit <a href="{{ route('admin.contacts') }}">Admin Panel</a> for full list.</em>
                </p>
            @endif
        @endif

        <hr style="margin: 40px 0;">
        
        <h3>🗄️ Database Table Structure</h3>
        <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; font-family: monospace;">
            <strong>Table:</strong> contacts<br>
            <strong>Columns:</strong><br>
            • id (Primary Key)<br>
            • name (VARCHAR)<br>
            • email (VARCHAR)<br>
            • phone (VARCHAR, nullable)<br>
            • subject (VARCHAR)<br>
            • message (TEXT)<br>
            • user_id (Foreign Key, nullable)<br>
            • status (ENUM: new, read, replied)<br>
            • replied_at (TIMESTAMP, nullable)<br>
            • created_at (TIMESTAMP)<br>
            • updated_at (TIMESTAMP)
        </div>

        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('contact_us') }}" style="margin-right: 10px;">📝 Contact Form</a>
            <a href="{{ route('admin.contacts') }}" style="margin-right: 10px;">👨‍💼 Admin Panel</a>
            <a href="{{ route('test.contact-test') }}">🧪 Test Form</a>
        </div>
    </div>
</body>
</html>
