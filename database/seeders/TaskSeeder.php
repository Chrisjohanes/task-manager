<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Complete Project Documentation',
                'description' => 'Write comprehensive documentation for the new feature including API endpoints, usage examples, and troubleshooting guide.',
                'status' => 'progress',
                'due_date' => Carbon::now()->addDays(3),
            ],
            [
                'title' => 'Review Pull Requests',
                'description' => 'Review and approve pending pull requests from the team members.',
                'status' => 'todo',
                'due_date' => Carbon::now()->addDays(1),
            ],
            [
                'title' => 'Fix Login Bug',
                'description' => 'Investigate and fix the login issue reported by users on mobile devices.',
                'status' => 'done',
                'due_date' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Update Dependencies',
                'description' => 'Update all npm and composer dependencies to their latest stable versions.',
                'status' => 'todo',
                'due_date' => Carbon::now()->addDays(5),
            ],
            [
                'title' => 'Team Meeting Preparation',
                'description' => 'Prepare slides and agenda for the weekly team meeting.',
                'status' => 'progress',
                'due_date' => Carbon::now()->addDays(2),
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
