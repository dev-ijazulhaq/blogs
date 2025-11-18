@extends('layouts.app')

@section('mainContent')

<!-- Register Section -->
<div class="container">
    <div class="card register-card">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-person-plus-fill register-icon mb-2"></i>
                <h4 class="fw-bold mb-1">Create Your Account</h4>
                <p class="text-muted small">Join Blogify and start sharing your ideas</p>
            </div>

            <form id='registrationForm'>
                <!-- Name -->
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <label for="" class="validationError" id='response_name'></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="John Doe">
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <label for="" class="validationError" id='response_email'></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="you@example.com">
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <label for="" class="validationError" id='response_password'></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="********">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="********">
                    </div>
                </div>

            </form>
            <button class="btn btn-primary w-100 py-2" id='accountRegistration'>Register</button>

            <div class="text-center mt-4">
                <p class="mb-0">Already have an account?
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{asset('js/authentication.js')}}"></script>
@endpush
@endSection