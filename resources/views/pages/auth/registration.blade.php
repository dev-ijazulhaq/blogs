@extends('layout/mainLayout')

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

            <form action="">

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="John Doe" required>
                    </div>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

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

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="********" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
            </form>

            <div class="text-center mt-4">
                <p class="mb-0">Already have an account?
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endSection