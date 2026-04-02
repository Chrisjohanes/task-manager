@extends('layouts.app')

@section('title', 'Register - Task Manager')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-6 col-lg-5" data-aos="fade-up">
            <!-- Register Card -->
            <div class="card-custom">
                <div class="card-header-custom text-center">
                    <h3 class="mb-0"><i class="bi bi-person-plus me-2"></i>Create Account</h3>
                    <p class="mb-0 opacity-75 small">Join Task Manager today</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <!-- Demo Mode Button -->
                    <div class="mb-4" data-aos="fade-in" data-aos-delay="100">
                        <form action="/auth/demo" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-custom w-100 py-3" style="border-radius: 12px;">
                                <i class="bi bi-rocket-takeoff me-2"></i>Try Demo Mode First
                            </button>
                        </form>
                        <p class="text-center text-muted small mt-2 mb-0">
                            <i class="bi bi-info-circle me-1"></i>Want to explore before signing up?
                        </p>
                    </div>
                    
                    <div class="text-center mb-4" data-aos="fade-in" data-aos-delay="200">
                        <span class="bg-light px-3 py-1 rounded-pill text-muted small">or register with email</span>
                    </div>
                    
                    <!-- Register Form -->
                    <form action="/register" method="POST" data-aos="fade-up" data-aos-delay="300">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person me-2 text-primary"></i>Full Name
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control form-control-custom" 
                                   value="{{ old('name') }}"
                                   placeholder="Enter your name"
                                   required
                                   autofocus>
                            @error('name')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope me-2 text-primary"></i>Email Address
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control form-control-custom" 
                                   value="{{ old('email') }}"
                                   placeholder="Enter your email"
                                   required>
                            @error('email')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock me-2 text-primary"></i>Password
                            </label>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control form-control-custom" 
                                   placeholder="At least 8 characters"
                                   required>
                            @error('password')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text small">
                                <i class="bi bi-info-circle me-1"></i>Must be at least 8 characters
                            </div>
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="bi bi-lock-fill me-2 text-primary"></i>Confirm Password
                            </label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   class="form-control form-control-custom" 
                                   placeholder="Confirm your password"
                                   required>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-gradient w-100 py-3 mb-3">
                            <i class="bi bi-person-plus me-2"></i>Create Account
                        </button>
                    </form>
                    
                    <!-- Login Link -->
                    <div class="text-center" data-aos="fade-in" data-aos-delay="400">
                        <p class="text-muted mb-0">
                            Already have an account? 
                            <a href="/login" class="text-decoration-none fw-semibold" style="color: var(--primary-color);">
                                Sign in
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Benefits List -->
            <div class="mt-4" data-aos="fade-up" data-aos-delay="500">
                <div class="card-custom p-3">
                    <h6 class="fw-semibold mb-3">
                        <i class="bi bi-star-fill text-warning me-2"></i>Member Benefits
                    </h6>
                    <ul class="small text-muted mb-0">
                        <li class="mb-2"><i class="bi bi-check2 me-2 text-success"></i>Save tasks permanently</li>
                        <li class="mb-2"><i class="bi bi-check2 me-2 text-success"></i>Access from any device</li>
                        <li class="mb-2"><i class="bi bi-check2 me-2 text-success"></i>Unlimited tasks</li>
                        <li class="mb-0"><i class="bi bi-check2 me-2 text-success"></i>Priority support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .min-vh-75 {
        min-height: 75vh;
    }
</style>
@endsection
