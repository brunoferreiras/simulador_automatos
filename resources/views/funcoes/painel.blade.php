@extends('layouts.menu')

@section('content')
    <section class="content-header text-center">
        <h1>
            Funções dos Autômatos
        </h1>
    </section>
    <form class="form-horizontal" role="form" action="{{ route('resultado_funcao') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="automato" class="control-label">Escolha o autômato</label>
            <select id="automato" name="automato" class="form-control">
                <option>Selecione um autômato</option>
                @forelse($automatos as $automato)
                    <option value="{{ $automato->id }}">{{ $automato->nome }}</option>
                @empty
                    <option>Nenhum autômato cadastrado!</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="funcao" class="control-label">Escolha a função</label>
            <select id="funcao" name="funcao" class="form-control">
                <option>Selecione uma função</option>
                <option value="1">Linguagem Gerada</option>
                <option value="2">Linguagem Marcada</option>
                <option value="3">Parte Acessível</option>
                <option value="4">Parte CoAcessível</option>
                <option value="5">TRIM</option>
                <option value="6">Complemento</option>
            </select>
        </div>

        <div class="col-md-6 col-md-offset-4">
            <a class="btn btn-default" href="{{ route('automatos.index') }}">Voltar</a>
            <button type="submit" class="btn btn-primary">
                Implementar
            </button>
        </div>
    </form>
@endsection