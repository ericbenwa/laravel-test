@extends('layouts.new')

@section('content')
	<h1>Hello authors</h1>

	@if(isset($name))
	{{ $name }}
	@else
	No name
	@endif
@endsection