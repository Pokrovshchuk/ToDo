<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createTask(CreateTaskRequest $request, Task $task)
    {
        return $task->create($request);
    }

    public function deleteTask(Request $request, Task $task)
    {
        return $task->delete($request);
    }

    public function editTask(EditTaskRequest $request, Task $task)
    {
        return $task->edit($request);
    }

    public function getAll()
    {
        return Task::all();
    }
}
