@extends('layout') 

@section('content')

	<h1 class="title">Create a new project</h1>

	<!-- make a POST request to /projects
	it needs a route -->
	<form method="POST" action="/projects">

		<!-- extra input to submit the form -->
		{{ csrf_field() }}

		<div class="field">
			<label class="label" for="title">Title</label>
			<div class="control">
				<input type="text" name="title" placeholder="Project title" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('title') }}" required>
				<!-- required: client side standar validation -->
				<!-- the value keeps the value in the field in case validation fails -->
			</div>
		</div>
		<div class="field">
			<label class="label" for="description">Description</label>
			<div class="control">
				<textarea name="description" placeholder="Project description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" value="{{ old('description') }}" required></textarea>
			</div>
		</div>
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Create Project</button>
			</div>
		</div>

		<!-- include the errors -->

		@include('errors')
		
	</form>

@endsection