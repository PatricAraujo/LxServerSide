@extends('layouts.fo')

@section('content')
    <h1>Olá, aqui podes Editar as prendas</h1>
    <h5>Prenda: {{ $giftInfo->name }}</h5>
    <h5>Valor estimado: {{ $giftInfo->estimated_value }}</h5>
    <h5>Valor gasto: {{ $giftInfo->spent_value }}</h5>
    <h5>Utilizador: {{ $giftInfo->user_name }}</h5>

    <br>

    <h1>Edição</h1>
    <div class="container mt-4">
        <h2>Editar Prenda de Natal</h2>

        <!-- Mostra erros de validação caso existam -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('xmas.updateGiftForm') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $giftInfo->id }}">


            <div class="row">
                <div class="col-md-8">

                    {{-- Nome da Prenda --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome da Prenda</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $giftInfo->name }}" required>
                    </div>

                    {{-- Valor Previsto --}}
                    <div class="mb-3">
                        <label for="estimated_value" class="form-label">Valor Previsto</label>
                        <input type="number" step="0.01" class="form-control" id="estimated_value"
                            name="estimated_value" value="{{ $giftInfo->estimated_value }}" required>
                    </div>

                    {{-- Valor Gasto --}}
                    <div class="mb-3">
                        <label for="spent_value" class="form-label">Valor Gasto (Opcional)</label>
                        <input type="number" step="0.01" class="form-control" id="spent_value" name="spent_value"
                            value="{{ $giftInfo->spent_value }}">
                    </div>

                    {{-- Utilizador --}}
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Utilizador Responsável</label>
                        <input type="text" class="form-control" id="user_name" value="{{ $giftInfo->user_name }}"
                            disabled>
                        {{-- esse erro aqui me pegou. Tinha esquecido que não dá de enviar os dados quando o campo esta desabilitado
                        então é só fazer um hidden tbm pra enviar acho eu... --}}
                        <input type="hidden" name="user_id" value="{{ $giftInfo->user_id }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Atualizar</button>

                </div>
            </div>
        </form>
    </div>

@endsection
