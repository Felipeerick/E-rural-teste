@extends('layouts.template_dashboard')
@extends('components.navbar')
@section('title', 'Reuniões')
@section('content')

<div class='container pt-4' style="min-height: 100vh;">
    
    <h1 class="mt-1 text-dark text-center h1">Sala de reunião: {{ $meeting->name }}</h1>
    <hr>

    <div>
        <embed src="{{$meeting->url}}" title="video youtube" allowfullscreen='true' height="70%" width="100%">
    </div>

</div>

@endsection