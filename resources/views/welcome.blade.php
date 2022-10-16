@extends('layouts.template_welcome')
@section('title', 'home')
@section('content')
    <main class="">
        <div class='text-center center'>
            <h1 class='text-dark margem'>Bem-vindo! Crie sua sala e convide amigos.</h1>
            <div class='mt-3' >     
                @if(!Auth::user())      
                    <a href="/register" class='me-3 text-decoration-none pe-3 btn btn-outline-dark'>Cadastre-se</a>
                <a href="/login" class='text-decoration-none btn btn-dark'>Faça login</a>
            </div>
        </div>
        @else
            <a href="/login" class='text-decoration-none btn btn-dark'>Entrar</a>
        @endif
     </main>
@endsection