@extends('layout')

@section('content')
<h1>{{ __('message.welcome') }}</h1>
<h1>@lang('message.welcome')</h1>

<p>{{ __('message.example_with_value', ['name' => "Trung"]) }}</p>
<p>{{ trans_choice('message.plural', 99, ['a' => 1]) }}</p>
{{-- Use JSON --}}
<p>{{ __('Wellcome to laravel!') }}</p>
<p>{{ __('Hello :name', ['name' => 'Trung']) }}</p>
@endsection