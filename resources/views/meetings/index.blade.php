@extends('layouts.template_dashboard')
@extends('components.navbar')
@section('title', 'Reuniões')
@section('content')
<div class='container pt-5' style="min-height: 100vh;">
    
    <h1 class="mt-1 mb-4 text-dark text-center h1">Reuniões</h1>
    <hr>
        <a href="{{ route('meetings.create') }}" class='btn btn-warning mt-3 mb-3'><i class="fa-solid fa-plus"></i> Criar nova reunião</a> 
    @if($errors->any())
        <div class="alert alert-info" role="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </div>
    @endif
    
    <div class="row mb-5 d-flex justify-content-center">
        @forelse($meetings as $meeting)
            <div class="col-md-6 col-lg-4 col-xl-3 mt-3" >
                <div class="w-100 d-flex justify-content-end">
                    @if(Auth::user()->id == $meeting->user_id)
                        <div class="d-flex gap-3">
                            <div>
                                <a href="{{ route('meetings.edit', $meeting->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div>
                                <form action="{{ route('meetings.destroy', $meeting->id) }}" method='POST'>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger mx-1"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endif 
                </div>
                <div class="card border-0 shadow mb-3" style="height: 350px;">
                    <span class="text-center py-3 bg-warning">Nome da Sala: <strong>{{$meeting->name}}</strong></span>
                    @if($meeting->status == 'public')
                        <div class="position-relative mb-3">
                        <iframe width="100%" height="200px" src="{{ $meeting->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <button class="btn btn-sm pe-none rounded-pill btn-warning position-absolute top-100 start-50 translate-middle"><strong>Video</strong></button>
                        </div>
                    @else
                        <form action="{{ route('meetings.validate', $meeting->id) }}" method='POST' class='rounded shadow p-3 p-lg-5 form-group' enctype="multipart/form-data">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-info" role="alert">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach 
                                </div>
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    <li>{{ session()->get('error') }}</li>
                                </div>
                            @endif

                            <input type="text" name="password" class="form-control mb-3" required placeholder="Digite a senha da sala">
                            <div class='text-center'>
                                <button type="submit" class='btn btn-warning mt-2'>Enviar</button>
                            </div>
                        </form>
                    @endif
                    <div class="card-body">
                        <h6 class="card-title pb-1 text-center">Administrador: <strong>{{$meeting->user->name}}</strong></h6>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center align-items-center text-center mt-5">
                <h3 class="h3">No momento não há nenhuma reunião!</h2>
            </div>
        @endforelse   
    </div>
</div>
<div class='justify-content-center pagination'  >
    {{$meetings->links('pagination::bootstrap-4')}}
</div>

@endsection