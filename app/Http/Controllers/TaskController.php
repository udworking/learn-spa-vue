<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }
    public function show(Task $task)
    {
        return response()->json($task);
    }
    public function store(Request $request)
    {
        return response()->json(Task::create($request->all()));
    }
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json($task);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return  response()->json($task);
    }
}
