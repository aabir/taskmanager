<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DB;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){

        //$tasks = Task::all();
        $tasks = DB::table('task')->orderBy('created_at', 'desc')->get();
    	return view('index', compact('tasks'));
    }

    public function store(Request $request){

    	$this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required',
        ]);

    	$task = new Task();
    	$task->name = $request->name;
    	$task->description = $request->description;

    	$task->save();
        return back()->with('success', 'New task added successfully.');

    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit', compact('task'));
    }

    public function update(Request $request)
    {

        $task = Task::find($request->id);

        $task->name = $request->name;
        $task->description = $request->description;

        $task->save();

        return back()->with('success', 'Task edited successfully.');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
    
}
