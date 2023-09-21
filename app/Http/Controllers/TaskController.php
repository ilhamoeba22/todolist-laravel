<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Routing\Controller as BaseController;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('todolist.index', compact('tasks'));
    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::created($request->all());
        return redirect()->route('todolist.index')->with('success', 'Task created successfully.');
    }

    public function edit()
    {
        return view('todolist.edit');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'complete' => 'boolean',
        ]);

        $task->update($request->all());
        return redirect()->route('todolist.index')->with('success', 'Task updated successfully.');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('todolist.index')->with('success', 'Task deleted successfully.');
    }
}
