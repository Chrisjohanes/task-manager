@extends('layouts.app')

@section('title', '🔐 Login - Access Your Workspace')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-6 col-lg-5" data-aos="fade-up">
            <!-- Login Card -->
            <div class="card-custom">
                <div class="card-header-custom text-center">
                    <h3 class="mb-0"><i class="bi bi-box-arrow-in-right me-2"></i>Welcome Back</h3>
                    <p class="mb-0 opacity-75 small">Sign in to your account</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <!-- Demo Mode Button -->
                    <div class="mb-4" data-aos="fade-in" data-aos-delay="100">
                        <form action="/auth/demo" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-custom w-100 py-3" style="border-radius: 12px;">
                                <i class="bi bi-rocket-takeoff me-2"></i>Try Demo Mode
                            </button>
                        </form>
                        <p class="text-center text-muted small mt-2 mb-0">
                            <i class="bi bi-info-circle me-1"></i>No account needed - instant access!
                        </p>
                    </div>
                    
                    <div class="text-center mb-4" data-aos="fade-in" data-aos-delay="200">
                        <span class="bg-light px-3 py-1 rounded-pill text-muted small">or sign in with email</span>
                    </div>
                    
                    <!-- Login Form -->
                    <form action="/login" method="POST" data-aos="fade-up" data-aos-delay="300">
                        @csrf
                        
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
                                   required
                                   autofocus>
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
                                   placeholder="Enter your password"
                                   required>
                            @error('password')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me for 30 days
                                </label>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-gradient w-100 py-3 mb-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </button>
                    </form>
                    
                    <!-- Register Link -->
                    <div class="text-center" data-aos="fade-in" data-aos-delay="400">
                        <p class="text-muted mb-0">
                            Don't have an account? 
                            <a href="/register" class="text-decoration-none fw-semibold" style="color: var(--primary-color);">
                                Create one
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Features List -->
            <div class="mt-4" data-aos="fade-up" data-aos-delay="500">
                <div class="row g-3">
                    <div class="col-4 text-center">
                        <div class="p-2">
                            <i class="bi bi-check-circle-fill text-success mb-1"></i>
                            <p class="small text-white mb-0">Track Tasks</p>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="p-2">
                            <i class="bi bi-shield-check-fill text-warning mb-1"></i>
                            <p class="small text-white mb-0">Secure</p>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="p-2">
                            <i class="bi bi-cloud-check-fill text-info mb-1"></i>
                            <p class="small text-white mb-0">Sync Anywhere</p>
                        </div>
                    </div>
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
