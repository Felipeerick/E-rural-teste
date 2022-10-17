@extends('layouts.template_dashboard')
@extends('components.navbar')
@section('title', 'Sala Privada')
@section('content')

    <main class='container'>
        <div class='row mt-2'>
            <div class='col-md-6 jumbotron mx-auto mt-5'>
                <form action="{{ route('meetings.validate', $data->id) }}" method='POST' class='rounded shadow p-3 p-lg-5 form-group' enctype="multipart/form-data">
                    @csrf
                    <label class='form-label text-info h3 mb-3'>Bem-vindo a sala de {{$data->user->name}}</label> 
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
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
                    <input type="text" minlength="5" name="password" class="form-control my-3" required id="password" placeholder="Digite a senha da sala">                
                    <div class='text-center'>
                        <button type="submit" class='btn btn-warning mt-2'>Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
@endsection