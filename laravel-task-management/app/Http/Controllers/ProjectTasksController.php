<?php

namespace App\Http\Controllers;

// import routes
use App\Task;
use App\Project;


class ProjectTasksController extends Controller
{

	public function store(Project $project)
    {

        // validate description
        $attributes = request()->validate(['description' => 'required']);

        // add a task to the current project
        $project->addTask($attributes);

        // redirect back
    	return back();
    }


    public function update(Task $task)
    {

        // check in which stay the task is: complete/ incomplete
        $method = request()->has('completed') ? 'complete' : 'incomplete';

        // call the correct method in the model
        $task-> $method();

    	// redirect back to the last page
    	return back();
    }

    
}
