<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
 /**
  * post to the database
  */
  function createTask(Request $request){
/**
 * Validate the use input 
 * 
 */
    $request->validate([
        'name'=>'required',
        'description'=> 'required',
        'deadline'=>'required'
        ]
    );

    // create first instance of Task table
    $task = Task::create(
        [
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline  
        ]
    );

    // return task to get full object from the database
    $task = Task::find($task->id) ;

    // return response

    return response([
        'status'=>'succes',
        'task' => $task
    ]);
  }
}

// $article = Article::find($request->id);
// $article = Article::all();
// $article->image = $file;
// $article->save();
// $article = Article::find($request->id);
// $articleRemoved = $article;
// $article->delete();



