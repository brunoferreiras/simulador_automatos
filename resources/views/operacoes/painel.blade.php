@extends('layouts.menu')

@section('content')
    <section class="content-header text-center">
        <h1>
            Operações com Autômatos
        </h1>
    </section>
    <form class="form-horizontal" role="form" action="{{ route('automatos.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="automato1" class="control-label">Escolha o primeiro autômato</label>
            <select id="automato1" name="automato1" class="form-control">
                <option>Selecione um autômato</option>
                @forelse($automatos as $automato)
                    <option value="{{ $automato->id }}">{{ $automato->nome }}</option>
                @empty
                    <option>Nenhum autômato cadastrado!</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="automato2" class="control-label">Escolha o segundo autômato</label>
            <select id="automato2" name="automato2" class="form-control">
                <option>Selecione um autômato</option>
                @forelse($automatos as $automato)
                    <option value="{{ $automato->id }}">{{ $automato->nome }}</option>
                @empty
                    <option>Nenhum autômato cadastrado!</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="operacao" class="control-label">Escolha a operacao</label>
            <select id="operacao" class="form-control">
                <option>Selecione uma função</option>
                <option value="1">Composição Produto</option>
                <option value="2">Composição Paralela</option>
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