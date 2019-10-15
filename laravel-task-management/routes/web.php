<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
	CONVENTIONS

	GET 	/projects 			(index)
	GET 	/projects/create 	(create)
	GET 	/projects/1 		(show)
	POST 	/projects 			(store)
	GET 	/projects/1/edit 	(edit)
	PATCH 	/projects/1 		(update)
	DELETE 	/projects/1			(destroy)

*/


use App\Repositories\UserRepository;

Route::get('/', function (UserRepository $users) {	

	dd($users);

    return view('welcome');
});


// resource: shortcut routes for project 
Route::resource('projects','ProjectsController');


// create a new task
Route::post('projects/{project}/tasks','ProjectTasksController@store');


// update the tasks of a project
Route::patch('tasks/{task}','ProjectTasksController@update');


// log in and registration pages 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



