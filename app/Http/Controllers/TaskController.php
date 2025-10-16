<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', 1)->get();
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
        $data['user_id'] = 2;

        Task::create($data);

        return redirect()->route('tasks.index')->with(['message' => 'New task added!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $data = $request->validated();
        $data['user_id'] = 2;

        $task = Task::findOrFail($id);
        $task->update($data);

        return redirect()->back()->with(['message' => 'Task updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with(['message' => 'Task deleted!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('task.trash', compact('tasks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->restore();

        return redirect()->route('tasks.index')->with(['message' => 'Task restored!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function permanentDestroy(string $id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->forceDelete();
        return redirect()->route('tasks.index')->with(['message' => 'Task deleted completely!']);
    }
}
