@extends('layouts.menu')

@section('content')
    <section class="content-header">
        <h1>
            Criar Autômato
        </h1>
    </section>
    <form class="form-horizontal" action="{{ route('automatos.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome" placeholder="Digite o nome do autômato" required>    
            </div>            
        </div>  

        <div class="form-group">
            <label for="estados" class="col-sm-2 control-label">Estados:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="estados" placeholder="Digite os estados do autômato. Exemplo: X1, X2, X3" required>    
            </div>            
        </div> 

        <div class="form-group">
            <label for="eventos" class="col-sm-2 control-label">Eventos:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="eventos" placeholder="Digite os eventos do autômato. Exemplo: X1, X2, X3" required>    
            </div>            
        </div> 

        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Função de Relação Estados e Eventos:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome" placeholder="Digite a função de relação estados e eventos. Exemplo: (x -> Y)" required>    
            </div>            
        </div> 

        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Estado Inicial:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome" placeholder="Digite o estado inicial do autômato. Exemplo: X1" required>    
            </div>            
        </div>    

        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Estados Marcados:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome" placeholder="Digite os estados marcados do autômato. Exemplo: X1, X2" required>    
            </div>            
        </div>    

        <div class="col-md-6 col-md-offset-4">
                <a class="btn btn-default" href="{{ route('automatos.index') }}">Voltar</a>
                <button type="submit" class="btn btn-primary">
                    Cadastrar
                </button>
            </div>
    </form>
@endsection