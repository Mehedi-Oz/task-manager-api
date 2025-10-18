<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->get();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        Auth::user()->tasks()->create($data);

        return redirect()->route('tasks.index')->with(['message' =>
        'New task added!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validated();
        $task->update($data);

        return redirect()->back()->with(['message' => 'Task
       updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->back()->with(['message' => 'Task
       deleted!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $tasks = Auth::user()->tasks()->onlyTrashed()->get();
        return view('task.trash', compact('tasks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
        $task->restore();

        return redirect()->route('tasks.index')->with(['message' =>
        'Task restored!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function permanentDestroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
        $task->forceDelete();
        return redirect()->route('tasks.index')->with(['message' =>
        'Task deleted completely!']);
    }
}
