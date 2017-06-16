@extends('layouts.menu')

@section('content')
    <section class="content-header text-center">
        <h1>
            Resultado Operação: {{ $title }}
        </h1>
    </section>

    <fieldset>
        <legend>Gráfico do resultado do autômato</legend>
        <div id="myautomato"></div>
    </fieldset>

@endsection

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