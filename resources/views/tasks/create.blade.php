@extends('layouts.fo')

@section('content')
    <div class="container mt-4">
        <h2>Adicionar Nova Tarefa</h2>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-8">

                    {{-- Nome da Tarefa --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome da Tarefa</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    @error('name')
                        <p>Nome inválido</p>
                    @enderror

                    {{-- Descrição --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    {{-- Prazo --}}
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Prazo</label>
                        <input type="date" class="form-control" id="deadline" name="deadline">
                    </div>

                    {{-- Status --}}
                    {{-- <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="pendente">Pendente</option>
                        <option value="em_progresso">Em Progresso</option>
                        <option value="concluido">Concluído</option>
                    </select>
                </div> --}}

                    {{-- Dropdown de Utilizadores Dinâmico --}}
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Utilizador Responsável</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">Selecione um utilizador...</option>
                            @foreach ($usersBD as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Tarefa</button>

                </div>
            </div>
        </form>
    </div>
@endsection
