@extends('layouts.fo')

@section('content')

<h5>Detalhes da tarefa</h5>

    <h5>Nome: {{$taskInfo->name}}</h5>
    <h5>Descrição: {{$taskInfo->description}}</h5>
    <h5>Prazo: {{$taskInfo->due_at}}</h5:>
    <h5>status: {{$taskInfo->status == \App\Models\Task::STATUS_COMPLETED? 'Completo':'Incompleto' }}</h5>
    <h5>Utilizador responsavel: {{$taskInfo->user_name}}</h5>

@endsection
