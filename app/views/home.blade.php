@extends('base')

@section('head')

<link rel="stylesheet" type="text/css" href="another.css" />
@parent
@stop

@section('body')
<h1>hello yo template!</h1>
{{-- this is a comment --}}
@stop