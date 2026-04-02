<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',
            'password.required' => 'Password is required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/tasks')->with('success', 'Welcome back, ' . Auth::user()->name . '!');
        }

        return redirect()->back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput();
    }

    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',
            'email.unique' => 'This email is already registered',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Passwords do not match',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/tasks')->with('success', 'Account created successfully! Welcome to Task Manager.');
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Handle demo mode login.
     */
    public function demoMode(Request $request)
    {
        // Create or get demo user
        $demoUser = User::firstOrCreate(
            ['email' => 'demo@taskmanager.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('demo12345'),
            ]
        );

        // Login as demo user
        Auth::login($demoUser);
        $request->session()->regenerate();

        // Create demo tasks if none exist for demo user
        if ($demoUser->tasks()->count() === 0) {
            $this->createDemoTasks($demoUser);
        }

        return redirect('/tasks')->with('success', 'Welcome to Demo Mode! You are logged in as Demo User.');
    }

    /**
     * Create sample demo tasks.
     */
    private function createDemoTasks(User $user)
    {
        $demoTasks = [
            [
                'title' => 'Welcome to Task Manager! 👋',
                'description' => 'This is your first demo task. You can edit or delete it anytime. Try creating your own tasks!',
                'status' => 'done',
                'due_date' => now()->subDays(1),
            ],
            [
                'title' => 'Explore the Features',
                'description' => 'Check out all the features: create tasks, update status, set due dates, and track your progress.',
                'status' => 'progress',
                'due_date' => now()->addDays(2),
            ],
            [
                'title' => 'Create Your Account',
                'description' => 'When you\'re ready, create a personal account to save your tasks permanently. Demo tasks will be cleared after session.',
                'status' => 'todo',
                'due_date' => now()->addDays(5),
            ],
            [
                'title' => 'Share with Friends',
                'description' => 'Love this Task Manager? Share it with your friends and colleagues!',
                'status' => 'todo',
                'due_date' => now()->addDays(7),
            ],
        ];

        foreach ($demoTasks as $task) {
            $user->tasks()->create($task);
        }
    }
}
