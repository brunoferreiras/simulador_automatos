<div class="form-group {{ $errors->has('nome') ? ' has-error' : ''}}">
    <label for="nome" class="col-sm-2 control-label">Nome:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="nome" placeholder="Digite o nome do autômato"
               required>
        @if ( $errors->has('nome') )
            <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('estados') ? ' has-error' : ''}}">
    <label for="estados" class="col-sm-2 control-label">Estados:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="estados" placeholder="Digite os estados do autômato. Exemplo: X1, X2, X3" required>
        @if ( $errors->has('estados') )
            <span class="help-block">
                <strong>{{ $errors->first('estados') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('eventos') ? ' has-error' : ''}}">
    <label for="eventos" class="col-sm-2 control-label">Eventos:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="eventos" placeholder="Digite os eventos do autômato. Exemplo: X1, X2, X3" required>
        @if ( $errors->has('eventos') )
            <span class="help-block">
                <strong>{{ $errors->first('eventos') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('relacao_estados_eventos') ? ' has-error' : ''}}">
    <label for="relacao_estados_eventos" class="col-sm-2 control-label">Função de Relação Estados e Eventos:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="relacao_estados_eventos" placeholder="Digite a função de relação estados e eventos. Exemplo: (x -> Y)" required>
        @if ( $errors->has('relacao_estados_eventos') )
            <span class="help-block">
                <strong>{{ $errors->first('relacao_estados_eventos') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('estado_inicial') ? ' has-error' : ''}}">
    <label for="estado_inicial" class="col-sm-2 control-label">Estado Inicial:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="estado_inicial" placeholder="Digite o estado inicial do autômato. Exemplo: X1" required>
        @if ( $errors->has('estado_inicial') )
            <span class="help-block">
                <strong>{{ $errors->first('estado_inicial') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('estados_marcados') ? ' has-error' : ''}}">
    <label for="estados_marcados" class="col-sm-2 control-label">Estados Marcados:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="estados_marcados" placeholder="Digite os estados marcados do autômato. Exemplo: X1, X2" required>
        @if ( $errors->has('estados_marcados') )
            <span class="help-block">
                <strong>{{ $errors->first('estados_marcados') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-6 col-md-offset-4">
    <a class="btn btn-default" href="{{ route('automatos.index') }}">Voltar</a>
    <button type="submit" class="btn btn-primary">
        Cadastrar
    </button>
</div>