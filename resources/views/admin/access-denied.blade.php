@extends('admin.layout')

@section('title', 'Access Denied')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center">
                    <h3 class="mb-0">
                        <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                        Access Denied
                    </h3>
                </div>
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-shield-alt text-danger" style="font-size: 4rem; opacity: 0.7;"></i>
                    </div>
                    
                    <h4 class="text-danger mb-3">Access Denied!</h4>
                    
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ $message ?? 'Access Denied: Only superadmin can access this resource.' }}
                    </div>
                    
                    <div class="row g-2 mt-4">
                        <div class="col-6">
                            <button onclick="history.back()" class="btn btn-secondary w-100">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </button>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admins.index') }}" class="btn btn-primary w-100">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3" style="background: rgba(102, 187, 242, 0.05); border-radius: 8px;">
                        <small class="text-muted">
                            <i class="fas fa-lightbulb me-1"></i>
                            <strong>Note:</strong> If you believe this is an error, please contact the system administrator.
                        </small>
                    </div>

                    @if(Auth::user()->role !== 'superadmin')
                    <div class="mt-3">
                        <small class="text-info">
                            <i class="fas fa-user-tag me-1"></i>
                            Role Anda: <strong>{{ ucfirst(Auth::user()->role) }}</strong>
                        </small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto redirect after 8 seconds
    setTimeout(function() {
        window.location.href = "{{ route('admins.index') }}";
    }, 8000);
    
    // Show countdown
    let countdown = 8;
    const countdownElement = document.createElement('div');
    countdownElement.className = 'mt-3 text-muted';
    countdownElement.innerHTML = '<small><i class="fas fa-clock me-1"></i>Redirecting to dashboard in <span id="countdown">8</span> seconds...</small>';
    document.querySelector('.card-body').appendChild(countdownElement);
    
    const countdownTimer = setInterval(function() {
        countdown--;
        document.getElementById('countdown').textContent = countdown;
        if (countdown <= 0) {
            clearInterval(countdownTimer);
        }
    }, 1000);
</script>
@endsection