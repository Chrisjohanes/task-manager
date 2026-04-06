@extends('layouts.app')

@section('title', '➕ Create New Task - Add to Your List')

@section('content')
<div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card Create Task -->
            <div class="card-custom" data-aos="fade-right">
                <div class="card-header-custom">
                    <div class="d-flex align-items-center">
                        <a href="/tasks" class="btn btn-sm btn-light me-3" style="border-radius: 10px;">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <div>
                            <h3 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Create New Task</h3>
                            <p class="mb-0 opacity-75 small">Add a new task to your list</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="/tasks" method="POST">
                        @csrf
                        
                        <!-- Title Field -->
                        <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                            <label for="title" class="form-label fw-semibold">
                                <i class="bi bi-card-heading me-2 text-primary"></i>Task Title
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   class="form-control form-control-custom" 
                                   value="{{ old('title') }}"
                                   placeholder="e.g., Complete project documentation"
                                   required
                                   autofocus>
                            @error('title')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Description Field -->
                        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                            <label for="description" class="form-label fw-semibold">
                                <i class="bi bi-card-text me-2 text-primary"></i>Description
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      class="form-control form-control-custom" 
                                      rows="4"
                                      placeholder="Describe your task in detail (optional)">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Status Field -->
                        <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
                            <label for="status" class="form-label fw-semibold">
                                <i class="bi bi-flag me-2 text-primary"></i>Status
                            </label>
                            <select name="status" 
                                    id="status" 
                                    class="form-select form-control-custom"
                                    required>
                                <option value="todo" {{ old('status') == 'todo' ? 'selected' : '' }}>
                                    <i class="bi bi-clock"></i> To Do
                                </option>
                                <option value="progress" {{ old('status') == 'progress' ? 'selected' : '' }}>
                                    <i class="bi bi-arrow-repeat"></i> In Progress
                                </option>
                                <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>
                                    <i class="bi bi-check-circle"></i> Done
                                </option>
                            </select>
                            @error('status')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Due Date Field -->
                        <div class="mb-4" data-aos="fade-up" data-aos-delay="400">
                            <label for="due_date" class="form-label fw-semibold">
                                <i class="bi bi-calendar3 me-2 text-primary"></i>Due Date
                            </label>
                            <input type="date" 
                                   name="due_date" 
                                   id="due_date" 
                                   class="form-control form-control-custom" 
                                   value="{{ old('due_date') }}"
                                   min="{{ date('Y-m-d') }}">
                            @error('due_date')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>Set a deadline for this task
                            </div>
                        </div>
                        
                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2" data-aos="fade-up" data-aos-delay="500">
                            <button type="submit" class="btn btn-gradient flex-grow-1">
                                <i class="bi bi-check-lg me-2"></i>Create Task
                            </button>
                            <a href="/tasks" class="btn btn-outline-custom">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Tips Card -->
            <div class="card-custom mt-4" data-aos="fade-left">
                <div class="card-body p-4">
                    <h6 class="mb-3">
                        <i class="bi bi-lightbulb text-warning me-2"></i>Tips for Better Task Management
                    </h6>
                    <ul class="text-muted small mb-0">
                        <li>Give your tasks clear and specific titles</li>
                        <li>Add detailed descriptions to provide context</li>
                        <li>Set realistic due dates to stay on track</li>
                        <li>Update task status as you make progress</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-focus on title field
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        if (titleInput && !titleInput.value) {
            titleInput.focus();
        }
    });
</script>
@endpush
