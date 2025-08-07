@extends('admin.css')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-envelope text-primary mr-2"></i>Contact Messages
            </h1>
            <p class="mb-0 text-gray-600">Manage and respond to customer inquiries</p>
        </div>
        <div class="d-flex align-items-center">
            @php
                $newCount = 0;
                $totalCount = 0;
                try {
                    $newCount = \App\Models\Contact::where('status', 'new')->count();
                    $totalCount = \App\Models\Contact::count();
                } catch (Exception $e) {
                    // Handle error silently
                }
            @endphp
            <div class="card border-0 shadow-sm mr-3">
                <div class="card-body p-3 text-center">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Messages</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newCount }}</div>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 text-center">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Messages</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCount }}</div>
                </div>
            </div>
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

    <!-- Main Content Card -->
    <div class="card shadow border-0">
        <div class="card-header bg-gradient-primary py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-list mr-2"></i>All Contact Messages
                    </h6>
                </div>
                <div class="col-auto">
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Filter Options:</div>
                            <a class="dropdown-item" href="{{ route('admin.contacts') }}">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>All Messages
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.contacts') }}?status=new">
                                <i class="fas fa-circle fa-sm fa-fw mr-2 text-warning"></i>New Messages
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.contacts') }}?status=replied">
                                <i class="fas fa-check-circle fa-sm fa-fw mr-2 text-success"></i>Replied Messages
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 text-xs font-weight-bold text-primary text-uppercase">
                                <i class="fas fa-hashtag mr-1"></i>ID
                            </th>
                            <th class="border-0 text-xs font-weight-bold text-primary text-uppercase">
                                <i class="fas fa-user mr-1"></i>Sender
                            </th>
                            <th class="border-0 text-xs font-weight-bold text-primary text-uppercase">
                                <i class="fas fa-envelope mr-1"></i>Contact
                            </th>
                            <th class="border-0 text-xs font-weight-bold text-primary text-uppercase">
                                <i class="fas fa-tag mr-1"></i>Subject
                            </th>
                            <th class="border-0 text-xs font-weight-bold text-primary text-uppercase">
                                <i class="fas fa-flag mr-1"></i>Status
                            </th>
                            <th class="border-0 text-xs font-weight-bold text-primary text-uppercase">
                                <i class="fas fa-clock mr-1"></i>Date
                            </th>
                            <th class="border-0 text-xs font-weight-bold text-primary text-uppercase text-center">
                                <i class="fas fa-cogs mr-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @forelse($contacts as $contact)
                        <tr class="contact-row {{ $contact->status === 'new' ? 'table-warning-light' : '' }}" style="transition: all 0.3s ease;">
                            <td class="align-middle">
                                <span class="badge badge-light font-weight-bold">#{{ str_pad($contact->id, 3, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle mr-3">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-gray-800">{{ $contact->name }}</div>
                                        @if($contact->user)
                                            <small class="text-primary">
                                                <i class="fas fa-user-check mr-1"></i>Registered User
                                            </small>
                                        @else
                                            <small class="text-muted">
                                                <i class="fas fa-user-times mr-1"></i>Guest User
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div>
                                    <div class="text-gray-800">
                                        <i class="fas fa-envelope mr-1 text-primary"></i>
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none">{{ $contact->email }}</a>
                                    </div>
                                    @if($contact->phone)
                                        <div class="mt-1">
                                            <i class="fas fa-phone mr-1 text-success"></i>
                                            <a href="tel:{{ $contact->phone }}" class="text-decoration-none text-muted small">{{ $contact->phone }}</a>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="subject-preview">
                                    <div class="font-weight-bold text-gray-800" title="{{ $contact->subject }}">
                                        {{ Str::limit($contact->subject, 25) }}
                                    </div>
                                    <small class="text-muted">{{ Str::limit($contact->message, 40) }}...</small>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                @if($contact->status === 'new')
                                    <span class="badge badge-warning badge-lg">
                                        <i class="fas fa-circle mr-1"></i>New
                                    </span>
                                @elseif($contact->status === 'read')
                                    <span class="badge badge-info badge-lg">
                                        <i class="fas fa-eye mr-1"></i>Read
                                    </span>
                                @else
                                    <span class="badge badge-success badge-lg">
                                        <i class="fas fa-check-circle mr-1"></i>Replied
                                    </span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <div>
                                    <div class="text-gray-800 font-weight-bold">{{ $contact->created_at->format('M d, Y') }}</div>
                                    <small class="text-muted">{{ $contact->created_at->format('H:i A') }}</small>
                                    <div class="mt-1">
                                        <small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                       class="btn btn-sm btn-outline-primary" 
                                       title="View Message" 
                                       data-toggle="tooltip">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($contact->status !== 'replied')
                                    <form method="POST" action="{{ route('admin.contacts.reply', $contact->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-success" 
                                                title="Mark as Replied" 
                                                data-toggle="tooltip"
                                                onclick="return confirm('Mark this message as replied?')">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                                    <h5 class="text-gray-500">No contact messages found</h5>
                                    <p class="text-gray-400 mb-0">Messages from customers will appear here once submitted.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($contacts->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    <div class="pagination-wrapper">
                        {{ $contacts->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
.table-warning-light {
    background-color: rgba(255, 193, 7, 0.1) !important;
}

.contact-row:hover {
    background-color: rgba(0, 123, 255, 0.05) !important;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.avatar-circle {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

.badge-lg {
    padding: 0.5rem 0.75rem;
    font-size: 0.8rem;
    border-radius: 0.5rem;
}

.subject-preview {
    max-width: 200px;
}

.empty-state {
    padding: 2rem;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.btn-group .btn {
    margin-right: 0.25rem;
}

.btn-group .btn:last-child {
    margin-right: 0;
}

.pagination-wrapper .pagination {
    margin-bottom: 0;
}

.pagination-wrapper .page-link {
    color: #667eea;
    border-color: #dee2e6;
}

.pagination-wrapper .page-item.active .page-link {
    background-color: #667eea;
    border-color: #667eea;
}

.pagination-wrapper .page-link:hover {
    color: #764ba2;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.card {
    border-radius: 0.75rem;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
}

.table th {
    border-top: none;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem 0.75rem;
}

.table td {
    padding: 1rem 0.75rem;
    border-top: 1px solid #e3e6f0;
    vertical-align: middle;
}

.alert {
    border-radius: 0.5rem;
    border: none;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    border-radius: 0.5rem;
}

.dropdown-item:hover {
    background-color: #f8f9fc;
}

@media (max-width: 768px) {
    .d-sm-flex {
        display: block !important;
    }
    
    .mb-4 {
        margin-bottom: 1rem !important;
    }
    
    .subject-preview {
        max-width: 150px;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .btn-group {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .btn-group .btn {
        margin-right: 0;
        margin-bottom: 0.25rem;
    }
}
</style>

<!-- Initialize Tooltips -->
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    
    // Add smooth animations
    $('.contact-row').hover(
        function() {
            $(this).addClass('shadow-sm');
        },
        function() {
            $(this).removeClass('shadow-sm');
        }
    );
});
</script>
@endsection
