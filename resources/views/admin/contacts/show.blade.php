@extends('admin.css')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-envelope-open text-primary mr-2"></i>Message Details
            </h1>
            <p class="mb-0 text-gray-600">View and manage contact message</p>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.contacts') }}" class="btn btn-outline-primary shadow-sm mr-3">
                <i class="fas fa-arrow-left mr-2"></i>Back to Messages
            </a>
            @if($contact->status !== 'replied')
                <form method="POST" action="{{ route('admin.contacts.reply', $contact->id) }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-success shadow-sm" onclick="return confirm('Mark this message as replied?')">
                        <i class="fas fa-reply mr-2"></i>Mark as Replied
                    </button>
                </form>
            @endif
        </div>
    </div>
    
    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <!-- Message Content -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow border-0 h-100">
                <div class="card-header bg-gradient-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-comment-alt mr-2"></i>Message Content
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Status Badge -->
                    <div class="mb-4">
                        @if($contact->status === 'new')
                            <span class="badge badge-warning badge-lg">
                                <i class="fas fa-circle mr-2"></i>New Message
                            </span>
                        @elseif($contact->status === 'read')
                            <span class="badge badge-info badge-lg">
                                <i class="fas fa-eye mr-2"></i>Message Read
                            </span>
                        @else
                            <span class="badge badge-success badge-lg">
                                <i class="fas fa-check-circle mr-2"></i>Replied
                            </span>
                        @endif
                    </div>
                    
                    <!-- Subject -->
                    <div class="mb-4">
                        <h5 class="text-gray-800 font-weight-bold mb-2">
                            <i class="fas fa-tag text-primary mr-2"></i>Subject
                        </h5>
                        <div class="p-3 bg-light rounded border-left-primary">
                            <h6 class="mb-0 text-gray-800">{{ $contact->subject }}</h6>
                        </div>
                    </div>
                    
                    <!-- Message -->
                    <div class="mb-4">
                        <h5 class="text-gray-800 font-weight-bold mb-2">
                            <i class="fas fa-comment text-primary mr-2"></i>Message
                        </h5>
                        <div class="message-content p-4 bg-light rounded border">
                            <p class="mb-0 text-gray-800 line-height-lg">{{ $contact->message }}</p>
                        </div>
                    </div>
                    
                    <!-- Reply Status -->
                    @if($contact->replied_at)
                    <div class="reply-info p-3 bg-success-light rounded border-left-success">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-reply text-success mr-2"></i>
                            <strong class="text-success">Replied on {{ $contact->replied_at->format('M d, Y \a\t H:i A') }}</strong>
                        </div>
                        <small class="text-muted">{{ $contact->replied_at->diffForHumans() }}</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="col-lg-4">
            <!-- Sender Information -->
            <div class="card shadow border-0 mb-4">
                <div class="card-header bg-gradient-info py-3">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-user mr-2"></i>Sender Information
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Avatar and Name -->
                    <div class="text-center mb-4">
                        <div class="avatar-large mx-auto mb-3">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <h5 class="text-gray-800 font-weight-bold mb-1">{{ $contact->name }}</h5>
                        @if($contact->user)
                            <span class="badge badge-primary">
                                <i class="fas fa-user-check mr-1"></i>Registered User
                            </span>
                        @else
                            <span class="badge badge-secondary">
                                <i class="fas fa-user-times mr-1"></i>Guest User
                            </span>
                        @endif
                    </div>
                    
                    <!-- Contact Details -->
                    <div class="contact-details">
                        <div class="contact-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-primary mr-3">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">Email Address</small>
                                    <a href="mailto:{{ $contact->email }}" class="text-gray-800 font-weight-bold text-decoration-none">
                                        {{ $contact->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        @if($contact->phone)
                        <div class="contact-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-success mr-3">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">Phone Number</small>
                                    <a href="tel:{{ $contact->phone }}" class="text-gray-800 font-weight-bold text-decoration-none">
                                        {{ $contact->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="contact-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-info mr-3">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">Received</small>
                                    <div class="text-gray-800 font-weight-bold">{{ $contact->created_at->format('M d, Y') }}</div>
                                    <small class="text-muted">{{ $contact->created_at->format('H:i A') }} • {{ $contact->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                        
                        @if($contact->user)
                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-warning mr-3">
                                    <i class="fas fa-id-card text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">User ID</small>
                                    <div class="text-gray-800 font-weight-bold">#{{ str_pad($contact->user->id, 4, '0', STR_PAD_LEFT) }}</div>
                                    <small class="text-muted">{{ $contact->user->email }}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            @if($contact->status !== 'replied')
            <div class="card shadow border-0">
                <div class="card-header bg-gradient-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-cogs mr-2"></i>Quick Actions
                    </h6>
                </div>
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('admin.contacts.reply', $contact->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success btn-block shadow-sm mb-3" onclick="return confirm('Mark this message as replied?')">
                            <i class="fas fa-reply mr-2"></i>Mark as Replied
                        </button>
                    </form>
                    <small class="text-muted">This will update the message status and timestamp.</small>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
}

.bg-gradient-warning {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

.badge-lg {
    padding: 0.5rem 0.75rem;
    font-size: 0.9rem;
    border-radius: 0.5rem;
}

.avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.1);
}

.icon-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
}

.message-content {
    min-height: 120px;
    white-space: pre-wrap;
    word-wrap: break-word;
}

.line-height-lg {
    line-height: 1.8;
}

.border-left-primary {
    border-left: 0.25rem solid #667eea !important;
}

.border-left-success {
    border-left: 0.25rem solid #28a745 !important;
}

.bg-success-light {
    background-color: rgba(40, 167, 69, 0.1) !important;
}

.contact-item {
    padding: 0.75rem 0;
    border-bottom: 1px solid #e3e6f0;
}

.contact-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.card {
    border-radius: 0.75rem;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
}

.alert {
    border-radius: 0.5rem;
    border: none;
}

@media (max-width: 768px) {
    .d-sm-flex {
        display: block !important;
    }
    
    .mb-4 {
        margin-bottom: 1rem !important;
    }
    
    .avatar-large {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .icon-circle {
        width: 35px;
        height: 35px;
        font-size: 0.8rem;
    }
}
</style>
@endsection
