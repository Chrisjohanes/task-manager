<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            // Show only user's tasks when logged in
            $tasks = Auth::user()->tasks()->latest()->get();
        } else {
            // Show public/demo tasks for guests
            $tasks = Task::where('is_public', true)->latest()->get();
        }
        
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to create tasks.');
        }
        
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to create tasks.');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,progress,done',
            'due_date' => 'nullable|date|after_or_equal:today',
        ], [
            'title.required' => 'Task title is required',
            'title.max' => 'Task title must not exceed 255 characters',
            'status.required' => 'Please select a status',
            'status.in' => 'Invalid status selected',
            'due_date.date' => 'Please enter a valid date',
            'due_date.after_or_equal' => 'Due date must be today or a future date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date ?: null,
            'is_public' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // Check if user owns the task or is public
        if (!Auth::check() || Auth::id() !== $task->user_id) {
            if (!$task->is_public) {
                abort(403, 'Unauthorized access.');
            }
        }
        
        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to edit tasks.');
        }

        // Check if user owns the task
        if (Auth::id() !== $task->user_id) {
            abort(403, 'Unauthorized access.');
        }
        
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to update tasks.');
        }

        // Check if user owns the task
        if (Auth::id() !== $task->user_id) {
            abort(403, 'Unauthorized access.');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,progress,done',
            'due_date' => 'nullable|date',
        ], [
            'title.required' => 'Task title is required',
            'title.max' => 'Task title must not exceed 255 characters',
            'status.required' => 'Please select a status',
            'status.in' => 'Invalid status selected',
            'due_date.date' => 'Please enter a valid date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date ?: null,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to delete tasks.');
        }

        // Check if user owns the task
        if (Auth::id() !== $task->user_id) {
            abort(403, 'Unauthorized access.');
        }

        try {
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete task. Please try again.');
        }
    }
}
