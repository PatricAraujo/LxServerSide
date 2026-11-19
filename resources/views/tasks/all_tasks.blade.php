@extends('layouts.fo')

@section('content')
    <h5>Todas as tarefas</h5>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Data de conclusao</th>
                <th scope="col">Utilizador</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if (@isset($tasksDB))
                @foreach ($tasksDB as $task)
                    <tr>
                        <th></th>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->status == \App\Models\Task::STATUS_COMPLETED ? 'Completo' : 'Incompleto' }}</td>
                        <td>{{ $task->due_at }}</td>
                        <td>{{ $task->user_name }}</td>
                        <td><a href="{{ route('tasks.update', $task->id) }}" class="btn btn-info">Ver / Editar</a></td>
                        <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>
                    </tr>
                @endforeach
            @endisset
    </tbody>
@endsection
