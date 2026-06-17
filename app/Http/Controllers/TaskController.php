<?php

namespace App\Http\Controllers;

use App\Models\Task; // Imports the Task model so we can talk to the 'tasks' table in the database
use Illuminate\Http\Request; // Imports the Request class to handle incoming form data

class TaskController extends Controller
{
    // 1. SHOW ALL TASKS (Home / List Page)
    public function index()
    {
        // Fetch all tasks from the database, newest first, and save them in $tasks
        $tasks = Task::latest()->get();
        
        // Open the 'resources/views/tasks/index.blade.php' file and pass the tasks to it
        return view('tasks.index', compact('tasks'));
    }

    // 2. SHOW THE "ADD NEW TASK" FORM
    public function create()
    {
        // Just opens the blank form view located at 'resources/views/tasks/create.blade.php'
        return view('tasks.create');
    }

    // 3. SAVE A NEW TASK TO DATABASE (When the 'Create' form is submitted)
    public function store(Request $request)
    {
        // Rule checking: Make sure the user filled out the form correctly
        $validated = $request->validate([
            'title' => 'required|max:255',              // Title cannot be empty or too long
            'description' => 'nullable',                // Description is optional
            'employee_name' => 'required|max:255',      // Must assign to an employee
            'due_date' => 'required|date|after_or_equal:today', // Date must be today or in the future
        ]);

        // If rules pass, insert the form data directly into the database
        Task::create($validated);

        // Send the user back to the task list with a green success message banner
        return redirect()->route('tasks.index')->with('success', 'Task assigned successfully!');
    }

    // 4. SHOW THE "EDIT TASK" FORM FOR A SPECIFIC TASK
    public function edit($id)
    {
        // Look for the task by its ID. If it doesn't exist (like ID 9999), show a 404 error page.
        $task = Task::findOrFail($id);
        
        // Open 'resources/views/tasks/edit.blade.php' and pass this specific task's data to fill the inputs
        return view('tasks.edit', compact('task'));
    }

    // 5. UPDATE THE TASK IN DATABASE (When the 'Edit' form is submitted)
    public function update(Request $request, $id)
    {
        // Find the task we want to change
        $task = Task::findOrFail($id);

        // Validate the updated inputs (Note: 'status' is now required here)
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'employee_name' => 'required|max:255',
            'due_date' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed', // Must be one of these 3 choices
        ]);

        // Update the database row with the new data
        $task->update($validated);

        // Send the user back to the list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // 6. DELETE A TASK
    public function destroy($id)
    {
        // Find the task by its ID
        $task = Task::findOrFail($id);
        
        // Delete it from the database permanently
        $task->delete();

        // Send the user back to the list with a removal message
        return redirect()->route('tasks.index')->with('success', 'Task removed successfully!');
    }
}