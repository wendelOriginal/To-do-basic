<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{


    public function index(Request $request)
    {


    }




    public function create()
    {
        $data['categories'] = Category::all();
        return view('task.create', $data);
    }




    public function create_task(Request $request){
        $user_id = 1;
        $task = [
        'title' => $request->title
        , 'description' => $request->description
        , 'due_date' => $request->due_date,
        'user_id' => $user_id,
         'category_id' => $request->category_id
    ];
        if(Task::create($task)){
            return redirect(route('home'));
        };
    }


    public function checkerBox(Request $request)
    {
        $checker = Task::findOrFail($request->id);
        $checker->is_done = $request->is_done;
        $checker->save();

            return ['success'=> true];

    }

    public function edit(Request $request)
    {

        $data['categories'] = Category::all();
        $task = Task::find($request->id)->only('id','is_done', 'title', 'description', 'due_date', 'usee_id', 'category_id');


        $task['task'] = $task;
        return view('task.edit', $task, $data);
    }




    public function save_edit(Request $request)
    {


        $taskUp = $request->only( 'title', 'due_date', 'category_id', 'description');

        $taskUp['is_done'] = $request->is_done ? true : false;

        $task = Task::find($request->id);
        if(!$task){
            return redirect(route('home'));
        }
        $task->update($taskUp);
        $task->save();
        return redirect(route('home'));
    }



    public function delete(Request $request)
    {
        $task = Task::find($request->id);

        if($task){
            $task->delete();
        }

        return redirect(route('home'),302);
    }
}
