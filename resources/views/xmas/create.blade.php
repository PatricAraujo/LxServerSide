@extends('layouts.fo')

@section('content')

    <div class="container mt-4">
        <h2 class="text-white mb-4">Olá, aqui podes Adicionar Prendas de Natal</h2>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif


        <form method="POST" action="{{route('xmas.store')}}">
            @csrf

            <div class="row">

                <div class="col-md-8">

                    <div class="mb-3">
                        <label for="name" class="form-label">Prenda</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    @error('name')
                        <p>Nome inválido</p>
                    @enderror

                    <div class="mb-3">
                        <label for="estimated_value" class="form-label">Valor Previsto</label>
                        <input type="number" step="0.01" class="form-control" id="estimated_value"
                            name="estimated_value" required>
                    </div>

                    <div class="mb-3">
                        <label for="spent_value" class="form-label">Valor Gasto (Opcional)</label>
                        <input type="number" step="0.01" class="form-control" id="spent_value" name="spent_value">
                    </div>

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
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </div>
            </div>
        </form>
    </div>

@endsection
