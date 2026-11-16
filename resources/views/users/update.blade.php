@extends('layouts.fo')

@section('content')
    <h1>Olá, aqui podes Editar utilizadores</h1>
    <h5>Nome: {{$userInfo->name}}</h5>
    <h5>Email: {{$userInfo->email}}</h5>
    <h5>Morada: {{$userInfo->address}}</h5>
    <h5>NIF: {{$userInfo->nif}}</h5>

    <form method="POST" action="{{route('users.updateForm')}}">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{$userInfo->id}}">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required type="text" name="name" class="form-control" id="exampleInputEmail1"
            value="{{$userInfo->name}}"
                aria-describedby="emailHelp" >
        </div>
        @error('name')
            <p>Nome inválido</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{$userInfo->email}}" disabled>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>email inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input required type="text" name="address" class="form-control" id="exampleInputEmail1"
            value="{{$userInfo->address}}"
                aria-describedby="emailHelp" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIF</label>
            <input required type="text" name="nif" class="form-control" id="exampleInputEmail1"
            value="{{$userInfo->nif}}"
                aria-describedby="emailHelp" >
        </div>



        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

@endsection
