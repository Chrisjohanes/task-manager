@extends('layouts.app')

@section('title', 'Task Manager - Dashboard')

@section('content')
<div class="container" data-aos="fade-up">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card-custom" data-aos="fade-right">
                <div class="card-header-custom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1"><i class="bi bi-list-task me-2"></i>My Tasks</h2>
                            <p class="mb-0 opacity-75">Manage your tasks efficiently</p>
                        </div>
                        <a href="/tasks/create" class="btn btn-light btn-gradient">
                            <i class="bi bi-plus-lg me-1"></i>Add New Task
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Section -->
    <div class="row mb-4 g-3">
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
            <div class="stats-card">
                <div class="stats-icon total">
                    <i class="bi bi-clipboard-check"></i>
                </div>
                <h3 class="mb-0">{{ $tasks->count() }}</h3>
                <p class="text-muted mb-0 small">Total Tasks</p>
            </div>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
            <div class="stats-card">
                <div class="stats-icon todo">
                    <i class="bi bi-clock"></i>
                </div>
                <h3 class="mb-0">{{ $tasks->where('status', 'todo')->count() }}</h3>
                <p class="text-muted mb-0 small">To Do</p>
            </div>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
            <div class="stats-card">
                <div class="stats-icon progress">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                <h3 class="mb-0">{{ $tasks->where('status', 'progress')->count() }}</h3>
                <p class="text-muted mb-0 small">In Progress</p>
            </div>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
            <div class="stats-card">
                <div class="stats-icon done">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h3 class="mb-0">{{ $tasks->where('status', 'done')->count() }}</h3>
                <p class="text-muted mb-0 small">Completed</p>
            </div>
        </div>
    </div>
    
    <!-- Tasks Section -->
    <div class="row">
        <div class="col-12" data-aos="fade-up" data-aos-delay="500">
            @if($tasks->count() > 0)
                <div class="card-custom">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-custom table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="py-3 px-4">#</th>
                                        <th class="py-3 px-4">Task Title</th>
                                        <th class="py-3 px-4">Description</th>
                                        <th class="py-3 px-4">Status</th>
                                        <th class="py-3 px-4">Due Date</th>
                                        <th class="py-3 px-4 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $index => $task)
                                    <tr data-aos="fade-in" data-aos-delay="{{ $index * 100 }}">
                                        <td class="px-4">{{ $index + 1 }}</td>
                                        <td class="px-4">
                                            <div class="fw-semibold text-dark">{{ $task->title }}</div>
                                        </td>
                                        <td class="px-4">
                                            <div class="text-muted small">
                                                {{ Str::limit($task->description, 50) ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-4">
                                            @if($task->status === 'todo')
                                                <span class="badge badge-status badge-todo">
                                                    <i class="bi bi-clock me-1"></i>To Do
                                                </span>
                                            @elseif($task->status === 'progress')
                                                <span class="badge badge-status badge-progress">
                                                    <i class="bi bi-arrow-repeat me-1"></i>In Progress
                                                </span>
                                            @else
                                                <span class="badge badge-status badge-done">
                                                    <i class="bi bi-check-circle me-1"></i>Done
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4">
                                            <div class="{{ $task->due_date && strtotime($task->due_date) < time() ? 'text-danger' : 'text-muted' }}">
                                                <i class="bi bi-calendar3 me-1"></i>
                                                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No Date' }}
                                            </div>
                                        </td>
                                        <td class="px-4">
                                            <div class="d-flex justify-content-center gap-2">
                                                <!-- Edit Button -->
                                                <a href="/tasks/{{ $task->id }}/edit" 
                                                   class="btn btn-sm btn-outline-custom"
                                                   data-bs-toggle="tooltip" 
                                                   title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                
                                                <!-- Delete Button -->
                                                <form action="/tasks/{{ $task->id }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this task?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="tooltip" 
                                                            title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="card-custom">
                    <div class="card-body p-5">
                        <div class="empty-state">
                            <i class="bi bi-clipboard-data"></i>
                            <h4 class="text-muted mb-2">No tasks yet</h4>
                            <p class="text-muted mb-4">Start by creating your first task!</p>
                            <a href="/tasks/create" class="btn btn-gradient">
                                <i class="bi bi-plus-lg me-1"></i>Create Your First Task
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Floating Action Button (Mobile) -->
<a href="/tasks/create" class="fab d-md-none" data-aos="fade-in" data-aos-delay="600">
    <i class="bi bi-plus-lg"></i>
</a>
@endsection

@push('scripts')
<script>
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush
