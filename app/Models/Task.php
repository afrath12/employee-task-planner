<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // This allows Laravel to safely insert data into these specific database columns
    protected $fillable = [
        'title', 
        'description', 
        'employee_name', 
        'due_date', 
        'status'
    ];
}