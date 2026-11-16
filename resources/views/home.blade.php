@extends('layouts.fo')

@section('content')
    <img src="{{ asset('Images/Unit.png') }}" alt="warrior-icon">



    @if (isset($courseName))
        <h5>Curso: {{ $courseName }}</h5>
    @endisset

    @isset($contactInfo)
        <h5>Name: {{ $contactInfo['name'] }}</h5>
        <h5>Email: {{ $contactInfo['contact'] }}</h5>
        <h5>O contacto é o {{ $contactInfo['name'] }} - {{ $contactInfo['contact'] }}</h5>
    @endisset

    <br>

    @isset($cesaeInfo)
        <h5>Nome: {{ $cesaeInfo['name'] }}</h5>
        <h5>Endereço: {{ $cesaeInfo['address'] }}</h5>
        <h5>Email: {{ $cesaeInfo['email'] }}</h5>
    @endisset


    <br>

    {{-- ternario --}}
    <h5>Curso: {{ isset($courseName) ? $courseName : 'user' }}</h5>
    <h5>Alunos da turma</h5>
    <ul>
        @if (@isset($students))
            @foreach ($students as $student)
                <li>{{ $student }}</li>
            @endforeach
        @endisset
</ul>

<h5>Funcionalidades da nossa app</h5>
<ul>
    <li><a href="{{ route('welcome') }}">Inicio</a></li>
    <li><a href="{{ route('users.all') }}">Utilizadores</a></li>
    <li><a href="{{ route('users.create') }}">Adicionar Utilizador</a></li>
    <li><a href="{{ route('tasks.all') }}">Todas as tarefas</a></li>
</ul>


@endsection
