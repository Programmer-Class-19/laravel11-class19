<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Mendapatkan semua tasks
    public function index()
    {
        return view('tasks.index', ['tasks' => Task::all()]);
    }

    // Menyimpan task baru
    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Task::create($request->all());
        return redirect()->back();
    }

    // Menyelesaikan task
    public function update(Task $task)
    {
        $task->update(['completed' => !$task->completed]);
        return redirect()->back();
    }

    // Menghapus task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }

    // API untuk mendapatkan semua tasks
    public function apiTasks()
    {
        return response()->json(Task::all());
    }

    // API untuk menambah task baru
    public function apiStore(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task);
    }

    // API untuk memperbarui task
    public function apiUpdate(Task $task)
    {
        $task->update(['completed' => !$task->completed]);
        return response()->json($task);
    }

    // API untuk menghapus task
    public function apiDestroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}
