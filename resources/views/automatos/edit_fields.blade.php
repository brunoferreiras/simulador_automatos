<div class="form-group {{ $errors->has('nome') ? ' has-error' : ''}}">
    <label for="nome" class="col-sm-2 control-label">Nome:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="nome" value="{{ $automato->nome }}" placeholder="Digite o nome do autômato" required>
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
        <input type="text" class="form-control" name="estados" value="{{ $automato->estados }}" placeholder="Digite os estados do autômato." required>
        <p class="help-block"">Exemplo: X1, X2, X3</p>
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
        <input type="text" class="form-control" name="eventos" value="{{ $automato->eventos }}" placeholder="Digite os
        eventos do autômato." required>
        <p class="help-block"">Exemplo: E1, E2</p>
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
        <textarea class="form-control" name="relacao_estados_eventos" rows="4" placeholder="Digite a função de relação estados e eventos." required>{{ $automato->relacao_estados_eventos }}</textarea>
        <p class="help-block"><b>
                Exemplo:<br>
                E1 > X1 | -  | X3 ; <br>
                E2 > -  | X2 | - ;
            </b></p>
        <p class="help-block">Obs.: Os estados serão definidos na sequência em que foram criadas.</p>
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
        <input type="text" class="form-control" name="estado_inicial" value="{{ $automato->estado_inicial }}" placeholder="Digite o estado inicial do
        autômato." required>
        <p class="help-block"">Exemplo: X1</p>
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
        <input type="text" class="form-control" name="estados_marcados" value="{{ $automato->estados_marcados }}"
               placeholder="Digite os estados marcados do autômato." required>
        <p class="help-block"">Exemplo: X2, X3</p>
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