<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    public function index()
    {
        $task = Task::orderBy('id','desc')->get();
        return view('index', compact('task'));
    }

    public function create()
    {
        $statusis = [
            [
                'label' => 'Todo',
                'value' => 'Todo',
            ],
            [
                'label' => 'Done',
                'value' => 'Done',
            ]
        ];


        return view('create', compact('statusis'));
    }

    public function store(Request $request)
    {
       $request->validate([
            'tittle' => 'required|max:255'
        ]);
        $task = new Task();
        $task->tittle = $request->tittle;

        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect(route('index'));
    }
    public function edit($id)
    {
        $task=Task::findOrFail($id);
            $statusis = [
                [
                    'label' => 'Todo',
                    'value' => 'Todo',
                ],
                [
                    'label' => 'Done',
                    'value' => 'Done',
                ]
            ];


            return view('edit', compact('task','statusis'));
    }

    public function update(Request $request,$id)
    {
        $task=Task::findOrFail($id);
        $request->validate([
            'tittle' => 'required|max:255'
        ]);
        $task =Task::find($id);
        $task->tittle = $request->tittle;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('index');



    }

    public function delete($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index');
    }
}
