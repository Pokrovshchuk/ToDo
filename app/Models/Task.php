<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const TASK_NEW = 'new';
    public const TASK_DONE = 'done';

    public string
        $name,
        $description,
        $status;

    public function create($request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = self::TASK_NEW;
        $task->save();

        return $task;
    }

    public function edit($request)
    {
        $task = Task::where('id', $request->id)->firstOrFail();
        $task->name = $request->name;
        $task->status = $request->status;
        $task->save();

        return response()->json([
            'status' => 'Success',
            'data' => $task
        ]);
    }

    public function delete($request)
    {
        $task = Task::where('id', $request->id)->firstOrFail();
        $task->delete();

        return response()->json([
            'status' => 'Success'
        ]);
    }

}
