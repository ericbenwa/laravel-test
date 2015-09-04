@extends('layouts.default')

@section('content')
	<h1>Add New Author</h1>

	{{ Form::open(array('url' => '/authors/create', 'method' => 'POST')) }}

	<p>
		{{ Form::label('name', 'Name') }} <br />
		{{ Form::text('name', Input::old('name')) }}
	</p>

	<p>
		{{ Form::label('bio', 'Bio') }} <br />
		{{ Form::textarea('bio', Input::old('bio')) }}
	</p>

	<p>
		{{ Form::submit('Add Author') }}
	</p>

	{{ Form::close() }}
@endsection