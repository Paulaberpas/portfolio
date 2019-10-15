<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    // Mass assign the next array of data - save in the model at once
    protected $fillable = [
    	'title','description','owner_id'
    ];



    // relationship projects-tasks
    public function tasks()
    {
    	// a project has many task
    	return $this->hasMany(Task::class);
    }


    // add task to project
    public function addTask($task){
        // use project-task relationship to store task
        $this->tasks()->create($task);
    }
}






