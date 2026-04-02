<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date'
    ];

    /**
     * Cast attributes to native types.
     */
    protected function casts(): array
    {
        return [
            'due_date' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Check if task is overdue.
     */
    public function isOverdue(): bool
    {
        if (!$this->due_date || $this->status === 'done') {
            return false;
        }
        
        return $this->due_date->isPast();
    }

    /**
     * Get status color class.
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'todo' => 'warning',
            'progress' => 'primary',
            'done' => 'success',
            default => 'secondary',
        };
    }

    /**
     * Get status icon.
     */
    public function getStatusIconAttribute(): string
    {
        return match($this->status) {
            'todo' => 'bi-clock',
            'progress' => 'bi-arrow-repeat',
            'done' => 'bi-check-circle',
            default => 'bi-question-circle',
        };
    }
}
