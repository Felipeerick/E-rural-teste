@extends('layouts.template_dashboard')
@extends('components.navbar')
@section('title', 'Reuniões')
@section('content')

    <div class="container pt-5" style="height: 100vh;">
        <h1 class="text-center">Editar reunião</h1> 
        <hr>
        <form action="{{ route('meetings.update', $data->id) }}" method='POST' class='rounded shadow p-3 p-lg-5 form-group' enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if($errors->any())
                <div class="alert alert-info" role="alert">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach 
                </div>
            @endif
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="text" value="{{ $data->name }}" minlength="3" maxlength="40" maxlength="20" required name="name" class="form-control"  placeholder="Nome do video">
            <select name="status" required class="form-control my-3">
                <option value="private">Reunião privada</option>
                <option value="public">Reunião pública</option>
            </select>
            <input type="password" minlength="3" value="{{ $data->password }}" required name="password" class="form-control mb-3" required placeholder="Digite a senha da sala">
            <input type="text"  value="{{ $data->url }}" required name="url" class="form-control" required placeholder="Digite a url do seu video">
            <div class='text-center'>
                <button type="submit" class='btn btn-warning mt-2'>Editar reunião</button>
            </div>
        </form>
   </div>
@endsection