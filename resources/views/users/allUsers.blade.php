@extends('layouts.fo')

@section('content')
    <h1>Aqui vamos carregar todos utilizadores</h1>

    <h3>Users sem estarem carregados da base de dados</h3>
    <ul>
        @if (@isset($usersWDB))
            @foreach ($usersWDB as $user)
                <li>Nome: {{ $user['name'] }} / Email: {{ $user['email'] }}</li>
            @endforeach
        @endisset
</ul>
<br>
@if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<h6>Utilizadores da base de dados</h6>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">NIF</th>
            <th></th>
             <th></th>
        </tr>
    </thead>
    <tbody>
        @if(@isset($usersDB))
        @foreach ($usersDB as $userDB)
        <tr>
            <th scope="row">{{ $userDB->id }}</th>
            <td>{{ $userDB->name}}</td>
            <td>{{ $userDB->email }}</td>
            <td>{{ $userDB->address}}</td>
            <td>{{ $userDB->nif}}</td>
            <td><a href="{{route('users.update', $userDB->id )}}" class="btn btn-info">Ver / Editar</a></td>
            <td><a href="{{route('users.delete', $userDB->id )}}" class="btn btn-danger">Apagar</a></td>

            {{-- {{route('users.update', $userDB->id )}} --}}
        </tr>
        @endforeach
        @endisset
    </tbody>
</table>
@endsection
