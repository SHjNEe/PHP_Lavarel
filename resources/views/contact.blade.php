@extends('layout')

@section('content')
<h1>Contact</h1>
<p>Hello this is contact!</p>
@can('home.secrete')
<p>You is admin</p>
@endcan
@endsection