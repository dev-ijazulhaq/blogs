@extends('layouts.app')

@section('mainContent')

<div class="container">
    <div class="card register-card">
        <div class="card-body">

            <div class="text-center mb-4">
                <i class="bi bi-envelope-check-fill register-icon mb-2"></i>
                <h4 class="fw-bold mb-1">Verify Your Email</h4>
                <p class="text-muted small">
                    Before you continue, please check your inbox for a verification link.
                </p>
            </div>

            {{-- Success message after resending --}}
            @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success py-2">
                A new verification link has been sent to your email address.
            </div>
            @endif

            <div class="text-center mt-4">

                {{-- Resend Email Verification Link --}}
                <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary px-4 py-2 w-100 mb-3">
                        Resend Verification Email
                    </button>
                </form>

                {{-- Logout Button --}}
                <form method="POST" action="" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary px-4 py-2 w-100">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection