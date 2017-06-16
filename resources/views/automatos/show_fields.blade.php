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

@section('styles')
    <style type="text/css">
        #myautomato {
            width: 100%;
            height: 600px;
            border: 1px solid lightgray;
        }
    </style>
@endsection

<fieldset>
    <legend>Gráfico do autômato</legend>
    <div id="myautomato"></div>
</fieldset>

@section('scripts')
    <script type="text/javascript">
        var nodes = new vis.DataSet([
            {id: 'start', label: 'Estado Inicial', font: {size: 14}},
            {id: 0, label: '0'},
            {id: 1, label: '1'},
            {id: 2, label: '2'},
            {id: 3, label: '3'}
        ]);

        // create an array with edges
        var edges = new vis.DataSet([
            {from: 'start', to: 0},
            {from: 0, to: 0, label: 'a'},
            {from: 0, to: 1, label: 'b'},
            {from: 1, to: 0, label: 'a'},
            {from: 1, to: 3, label: 'b'},
            {from: 1, to: 2, label: 'c'},
            {from: 3, to: 0, label: 'a'}
        ]);

        // create a network
        var container = document.getElementById('myautomato');
        var data = {
            nodes: nodes,
            edges: edges
        };
        var options = {
            height: '100%',
            nodes: {
                color: {
                    border: '#000000',
                    background: '#FFFFFF',
                    highlight: {
                        border: '#2B7CE9',
                        background: '#D2E5FF'
                    },
                    hover: {
                        border: '#2B7CE9',
                        background: '#D2E5FF'
                    }
                },
                fixed: false,
                font: '24px arial black',
                shape: 'ellipse',
                shadow: true,
                physics: false
            },
            edges: {
                arrows: {
                    to: {
                        enabled: true,
                        scaleFactor: 1,
                        type: 'arrow'
                    }
                },
                font: {
                    color: '#343434',
                    size: 24, // px
                    face: 'arial',
                    align: 'top'
                },
                smooth: {
                    enabled: true,
                    type: "dynamic",
                    roundness: 0.5
                }
            },
            layout:{
                randomSeed: 1,
                improvedLayout: true
            }
        };
        var network = new vis.Network(container, data, options);

        // Onde vai ser definido os estados marcados
        network.on("afterDrawing", function (ctx) {
            var nodeId = 0;
            var nodePosition = network.getPositions([nodeId]);
            ctx.strokeStyle = '#343434';
            ctx.lineWidth = 2;
            ctx.fillStyle = '#A6D5F7';
            ctx.circle(nodePosition[nodeId].x, nodePosition[nodeId].y,18);
            ctx.stroke();
        });
    </script>
@endsection
