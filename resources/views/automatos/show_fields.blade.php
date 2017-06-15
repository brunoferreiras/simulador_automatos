<fieldset>
    <legend>Informações Gerais</legend>
    <!-- Nome Field -->
    <div class="row">
        <div class="col-sm-12">

            <div class="form-group">
                <label>Nome:</label>
                <p>{{ $automato->nome }}</p>
            </div>
        </div>
    </div>

    <!-- Estados Field -->
    <div class="row">
        <div class="col-sm-12">

            <div class="form-group">
                <label>Estados:</label>
                <p>{{ $automato->estados }}</p>
            </div>
        </div>
    </div>

    <!-- Eventos Field -->
    <div class="row">
        <div class="col-sm-12">

            <div class="form-group">
                <label>Eventos:</label>
                <p>{{ $automato->eventos }}</p>
            </div>
        </div>
    </div>

    <!-- Relação entre estados e eventos Field -->
    <div class="row">
        <div class="col-sm-12">

            <div class="form-group">
                <label>Relação entre estados e eventos:</label>
                <p>{{ $automato->relacao_estados_eventos }}</p>
            </div>
        </div>
    </div>

    <!-- Estado Inicial Field -->
    <div class="row">
        <div class="col-sm-12">

            <div class="form-group">
                <label>Estado Inicial:</label>
                <p>{{ $automato->estado_inicial }}</p>
            </div>
        </div>
    </div>

    <!-- Estados Marcados Field -->
    <div class="row">
        <div class="col-sm-12">

            <div class="form-group">
                <label>Estados Marcados:</label>
                <p>{{ $automato->estados_marcados }}</p>
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>Gráfico do autômato</legend>

</fieldset>
