<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    // which fields are not mass assigned
	protected $guarded = [];



    // by default set completed to true
    public function complete($completed = true)
    {

        // $this->update(['completed' => $completed]);
    
        $this->update(compact('completed'));

        return back();
    }


    // to incomplete a task
    public function incomplete()
    {
        // $this->update(['completed' => false]);
       
        // reuse the complete method 

        $this->complete(false);

        return back();

    }


    // relationship with project
    public function project()
    {
        // a task belongs to a project
    	return $this->belongsTo(Project::class);
    }
}
