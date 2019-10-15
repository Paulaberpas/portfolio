@extends('layout') 

@section('content')

	<h1 class="title">{{ $project->title }}</h1>

	<div class="content">{{ $project->description }}</div>

	<p>
		<a href="/projects/{{ $project->id }}/edit">Edit</a>
	</p>


	@if ($project->tasks->count())
		<div class="box">
			@foreach ($project->tasks as $task)
				<div>
					<!-- set up the route
					PATCH /projects/id/tasks/id
					PATCH /tasks/id  -->
					<form method="POST" action="/tasks/{{ $task->id }}">
						@method('PATCH')
						@csrf
						<label class="checkbox {{ $task->completed ? 'is-complete':'' }}" for="completed">
							<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked':'' }}>
							{{ $task->description }}
						</label>
					</form>	
				</div>
			@endforeach
		</div>
	@endif


	<!-- add a new task form -->
	<!-- add new route -->
	<form method="POST" action="/projects/{{ $project->id }}/tasks" class="box">
		@csrf
		<div class="field">
			<label class="label" for="description">New task</label>
			<div class="control">
				<input type="text" name="description" class="input" placeholder="New task" required>
			</div>
		</div>
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Add task</button>
			</div>
		</div>

	</form>


	<!-- the $errors object comes from the validation in the controller, because it's used multiple times add an errors.blade in resources -->

 	@include('errors')
	

@endsection