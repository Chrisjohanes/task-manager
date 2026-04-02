@extends('layouts.app')

@section('title', 'Welcome to Task Manager')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row align-items-center min-vh-75 py-5">
        <div class="col-lg-6" data-aos="fade-right">
            <h1 class="display-4 fw-bold text-white mb-4">
                Manage Your Tasks <br>
                <span class="text-warning">Efficiently</span>
            </h1>
            <p class="text-white opacity-75 lead mb-4">
                Stay organized and boost your productivity with our simple yet powerful task management system.
                Create, track, and complete your tasks with ease.
            </p>
            <div class="d-flex gap-3 flex-wrap">
                @auth
                    <a href="/tasks" class="btn btn-light btn-lg px-4 py-3" style="border-radius: 15px;">
                        <i class="bi bi-list-task me-2"></i>My Tasks
                    </a>
                    <a href="/tasks/create" class="btn btn-outline-light btn-lg px-4 py-3" style="border-radius: 15px;">
                        <i class="bi bi-plus-circle me-2"></i>New Task
                    </a>
                @else
                    <a href="/register" class="btn btn-light btn-lg px-4 py-3" style="border-radius: 15px;">
                        <i class="bi bi-person-plus me-2"></i>Get Started
                    </a>
                    <a href="/login" class="btn btn-outline-light btn-lg px-4 py-3" style="border-radius: 15px;">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                    </a>
                    <form action="/auth/demo" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-lg px-4 py-3" style="border-radius: 15px;">
                            <i class="bi bi-rocket-takeoff me-2"></i>Try Demo
                        </button>
                    </form>
                @endauth
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
            <div class="card-custom p-4" style="border-radius: 25px;">
                <div class="text-center">
                    <i class="bi bi-check2-square display-1 text-primary mb-3"></i>
                    <h3 class="fw-bold mb-3">Features</h3>
                    <ul class="list-unstyled text-start mx-auto" style="max-width: 300px;">
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Create and organize tasks
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Track task status (To Do, In Progress, Done)
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Set due dates and deadlines
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Beautiful and responsive UI
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Smooth animations and transitions
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Preview Section -->
    <div class="row g-4 mt-4" data-aos="fade-up" data-aos-delay="200">
        <div class="col-12">
            <div class="card-custom p-4">
                <div class="row text-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="p-3">
                            <i class="bi bi-lightning-charge-fill text-warning display-5 mb-2"></i>
                            <h5 class="fw-bold mb-1">Fast & Easy</h5>
                            <p class="text-muted small mb-0">Quick task creation and management</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="p-3">
                            <i class="bi bi-shield-check text-success display-5 mb-2"></i>
                            <h5 class="fw-bold mb-1">Secure</h5>
                            <p class="text-muted small mb-0">Your data is safely stored</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3">
                            <i class="bi bi-phone text-primary display-5 mb-2"></i>
                            <h5 class="fw-bold mb-1">Responsive</h5>
                            <p class="text-muted small mb-0">Works on all devices</p>
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
