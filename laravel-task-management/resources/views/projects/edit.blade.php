@extends('layout') 

@section('content')

	<h1 class="title">Edit Project</h1>

	<form method="POST" action="/projects/{{ $project->id }}"> 
		<!-- the helper method_field adds a hiden input so it routes correctly -->

		{{ method_field('PATCH') }}
		{{ csrf_field() }} <!-- because it's a form -->

		<div class="field">
			<label class="label" for="title">Title</label>
			<div class="control">
				<input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">	
			</div>
		</div>
		<div class="field">
			<label class="label" for="description">Description</label>
			<div class="control">
				<textarea name="description" class="textarea">{{ $project->description }}</textarea> 
			</div>
		</div>
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Update Project</button>	
			</div>
		</div>
	</form>

	@include('errors')

	<!-- submit a delete request -->
	<form method="POST" action="/projects/{{ $project->id }}">
		<!-- {{ method_field('DELETE') }}
		{{ csrf_field() }} because it's a form -->

		@method('DELETE')
		@csrf

		<div class="field">
			<div class="control">
				<button type="submit" class="button">Delete Project</button>	
			</div>
		</div>
	</form>

@endsection 