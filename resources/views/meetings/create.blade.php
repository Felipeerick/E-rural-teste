@extends('layouts.template_dashboard')
@extends('components.navbar')
@section('title', 'Sala')
@section('content')

    <div class="container pt-5" style="height: 100vh;">
        <h1 class="text-center">Cadastrar sala</h1> 
        <hr>
        <form action="{{ route('meetings.store') }}" method='POST' class='rounded shadow p-3 p-lg-5 form-group' enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-info" role="alert">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach 
                </div>
            @endif
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="text" minlength="3" maxlength="40" maxlength="20" required name="meetingName" class="form-control"  placeholder="Nome do video">
            <select name="status" required class="form-control my-3">
                <option value="private">sala privada</option>
                <option value="public">sala pública</option>
            </select>
            <input type="password" required name="password" class="form-control mb-3" required placeholder="Digite a senha da sala">
            <input type="text" required name="url" class="form-control" required placeholder="Digite a url do seu video">
            <div class='text-center'>
                <button type="submit" class='btn btn-warning mt-2'>Cadastrar sala</button>
            </div>
        </form>
   </div>
@endsection