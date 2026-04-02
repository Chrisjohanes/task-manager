@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card Edit Task -->
            <div class="card-custom" data-aos="fade-right">
                <div class="card-header-custom">
                    <div class="d-flex align-items-center">
                        <a href="/tasks" class="btn btn-sm btn-light me-3" style="border-radius: 10px;">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <div>
                            <h3 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Task</h3>
                            <p class="mb-0 opacity-75 small">Update your task information</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Title Field -->
                        <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                            <label for="title" class="form-label fw-semibold">
                                <i class="bi bi-card-heading me-2 text-primary"></i>Task Title
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   class="form-control form-control-custom" 
                                   value="{{ old('title', $task->title) }}"
                                   placeholder="Enter task title"
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
                                      placeholder="Enter task description (optional)">{{ old('description', $task->description) }}</textarea>
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
                                <option value="todo" {{ old('status', $task->status) == 'todo' ? 'selected' : '' }}>
                                    <i class="bi bi-clock"></i> To Do
                                </option>
                                <option value="progress" {{ old('status', $task->status) == 'progress' ? 'selected' : '' }}>
                                    <i class="bi bi-arrow-repeat"></i> In Progress
                                </option>
                                <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>
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
                                   value="{{ old('due_date', $task->due_date) }}">
                            @error('due_date')
                                <div class="text-danger small mt-1">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2" data-aos="fade-up" data-aos-delay="500">
                            <button type="submit" class="btn btn-gradient flex-grow-1">
                                <i class="bi bi-check-lg me-2"></i>Update Task
                            </button>
                            <a href="/tasks" class="btn btn-outline-custom">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Delete Card -->
            <div class="card-custom mt-4" data-aos="fade-left">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1 text-danger">
                                <i class="bi bi-trash me-2"></i>Danger Zone
                            </h6>
                            <p class="text-muted small mb-0">Once you delete a task, there is no going back.</p>
                        </div>
                        <form action="/tasks/{{ $task->id }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this task? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash me-1"></i>Delete Task
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Add smooth transition for form inputs
    document.querySelectorAll('.form-control-custom, .form-select-custom').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
</script>
@endpush
