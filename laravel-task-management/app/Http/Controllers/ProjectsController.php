<?php

namespace App\Http\Controllers;


use App\Project;
use App\Services\Twitter;


class ProjectsController extends Controller
{

    // middleware for all functions
    public function __construct()
    {
        $this->middleware('auth');

    }

	// create the function index that loads the projects directory in a file index(in resources->view)
    public function index()
    {

    	// to fetch projects where the owner's id is equal to the authentification id
        $projects = auth()->user()->projects;

    	// pass the variable to our view
    	return view('projects.index',['projects' => $projects]); 
    }


    // loads the create page
    public function create()
    {
    	return view('projects.create'); 
    }


    // stores the data submited
    public function store()
    {

        // extract the validation to a method
        $attributes = $this->validateProject();

        //store also the owner_id
        $attributes['owner_id'] = auth()->id();

        // save the project
        Project::create($attributes);

    	// redirect to the main view with the fetch projects
    	return redirect('/projects');
    }


    // example.com/projects/1/edit   
    // it takes as a parameter the id specified in the url
    public function edit($id)
    { 
        // it looks for the project
    	$project = Project::findOrFail($id);

        // returns edit view
    	return view('projects.edit', compact('project'));
    }


    // pass the project to update as a parameter
    public function update(Project $project)
    {

    	// pass the validation -> update project
        $project->update($this->validateProject());

        // redirect projects view
    	return redirect('/projects');
    }



    public function destroy(Project $project)
    {
        // delete the project
    	$project->delete();

        // redirect projects view
    	return redirect('/projects');
    }


   
    public function show(Project $project)
    {
        // authorized checks the policy and the auth service provider
        // check if we are authorized to view the given project
        $this->authorize('view', $project);

        // loads the project page
    	return view('projects.show', compact('project'));
    }

    
    // validates title and description
    protected function validateProject()
    {
        return request()->validate([
         'title' => ['required', 'min:3', 'max:255'],
         'description' => ['required', 'min:3', 'max:255']
        ]);

    }
}
