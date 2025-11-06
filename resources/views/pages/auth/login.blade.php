@extends('layout/mainLayout')
@section('mainContent')
<!-- Login Section -->
<div class="card login-card">
    <div class="card-body">
        <div class="text-center mb-4">
            <i class="bi bi-person-circle login-icon mb-2"></i>
            <h4 class="fw-bold mb-1">Welcome Back</h4>
            <p class="text-muted small">Login to your Blogify account</p>
        </div>

        <form action="" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="you@example.com" required>
                </div>
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="********" required>
                </div>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Options -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <a href="#" class="text-decoration-none text-primary small">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
        </form>

        <div class="text-center mt-4">
            <p class="mb-0">Don't have an account?
                <a href="{{route('registration')}}" class="text-decoration-none text-primary fw-semibold">Register</a>
            </p>
        </div>
    </div>
</div>
@endSection