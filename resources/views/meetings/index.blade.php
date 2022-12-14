@extends('layouts.template_dashboard')
@extends('components.navbar')
@section('title', 'Sala')
@section('content')
<div class='container pt-5' style="min-height: 100vh;">
    
    <h1 class="mt-1 mb-4 text-dark text-center h1">Sala</h1>
    <hr>
    <div class="d-flex justify-content-between">
        <form action="{{ route('meetings.index') }}" method="GET" class="w-50 mt-3 mx-2">
            @csrf
             <div class="input-group flex-nowrap">
               <input type="text" name="search" class="form-control" placeholder="Pesquisar o nome da sala..." aria-label="Pesquisar" aria-describedby="addon-wrapping">
               <button class="input-group-text bg-danger text-light me-3 rounded-end" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></button>
               <button type="submit" class="input-group-text bg-danger text-light rounded-start" id="addon-wrapping">
                  <i class="fa-solid fa-broom"></i>
               </button> 
             </div>
        </form>
        <div>
            <a href="{{ route('meetings.create') }}" class='btn btn-warning my-3'><i class="fa-solid fa-plus"></i> Criar nova sala</a>
        </div>
    </div>
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
                <div class="card border-0 shadow mb-3" style="height: 94%;">
                    <span class="text-center py-3 bg-warning">Nome da Sala: <strong>{{$meeting->meetingName}}</strong></span>
                    @if($meeting->status == 'public')
                        <div class="position-relative mb-4">
                        <iframe width="100%" height="200px" src="{{ $meeting->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <a  href="{{ route('meetings.show', $meeting->id) }}" class="btn btn-sm  rounded-pill btn-warning position-absolute top-100 start-50 translate-middle"><strong>Entrar na sala</strong></a>
                        </div>
                    @else
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Ei!</h4>
                        <p>Esta sala foi criada com senha e configurada para ser privada</p>
                        <hr>
                        <p>Se quiser acessa-la precisar?? da senha, <a href="{{ route('meetings.private', $meeting->id) }}">clique aqui para inserir</a></p>
                    </div>
                    @endif
                    <div class="card-body">
                        <h6 class="card-title align-content-center text-center">Administrador: <strong>{{$meeting->user->name}}</strong></h6>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center align-items-center text-center mt-5">
                <h3 class="h3">No momento n??o h?? nenhuma sala ou n??o existe sala com esse nome!</h2>
            </div>
        @endforelse   
    </div>
</div>
<div class='justify-content-center pagination'  >
    {{$meetings->links('pagination::bootstrap-4')}}
</div>

@endsection