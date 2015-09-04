@extends('layouts.default')

@section('content')
	<h1>Hello {{ $author->name }}</h1>

	<p>{{ $author->bio }}</p>

	<p>
		{{ HTML::linkRoute('authors', 'Authors') }} | 
		{{ HTML::linkRoute('edit_author', 'Edit', array($author->id)) }} | 

		{{ Form::open(array('url' => '/author/delete', 'method' => 'DELETE', 'style'=>'display:inline')) }}
		{{ Form::hidden('id', $author->id) }}
		{{ Form::submit('Delete') }}
		{{ Form::close() }}
	</p>

@endsection