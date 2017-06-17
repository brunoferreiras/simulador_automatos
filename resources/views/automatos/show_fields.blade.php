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
    <div id="myautomato"></div>
</fieldset>

@section('scripts')
    <script type="text/javascript">
        $(function() {
            // Cria os estados do autômato

            var stringArrayNodes = "{{ $nodes }}";
            var arrayNodes = stringArrayNodes.split("|");

            var nodes = [];

            var start = {
                id: 'start',
                label: 'Estado Inicial',
                font: {
                    size: 14
                }
            };

            nodes.push(start);
            for(indice in arrayNodes) {
                var item = {
                    id: arrayNodes[indice],
                    label: arrayNodes[indice]
                };
                nodes.push(item);
            }
//            console.log(nodes);

            var nodes = new vis.DataSet(nodes);

            // Cria as transições do autômato
            var edges = [];
            var estadoInicial = '{{ $estadoInicial }}';

            edges.push({from: 'start', to: estadoInicial});

            var edgesStringCompleto = '{{ $edges }}';
            var linhas = edgesStringCompleto.split(";");

            for(var i in linhas) {
                var relacao = linhas[i].split("|");
                var edge = {
                    from: relacao[0],
                    to: relacao[1],
                    label: relacao[2]
                };
                edges.push(edge);
            }

//            console.log(edges);
            var edges = new vis.DataSet(edges);

            // Cria o autômato
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
            var estadosMarcadosString = '{{ $estadosMarcados }}';

            var estadosMarcados = estadosMarcadosString.split("|");
            console.log(estadosMarcados);

            for(var i in estadosMarcados) {
                gerarMarcacao(estadosMarcados[i]);
            }

            function gerarMarcacao(index) {
                network.on("afterDrawing", function (ctx) {
                    var nodeId = index;
                    var nodePosition = network.getPositions([nodeId]);
                    ctx.strokeStyle = '#343434';
                    ctx.lineWidth = 2;
                    ctx.fillStyle = '#A6D5F7';
                    ctx.circle(nodePosition[nodeId].x, nodePosition[nodeId].y,18);
                    ctx.stroke();
                });
            }
        });
    </script>
@endsection
