<!doctype html>
<html>
<head>
    <title>Gráfico</title>
    <script src="http://visjs.org/dist/vis.js"></script>
    <link href="http://visjs.org/dist/vis-network.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
         #myautomato {
            width: 100%;
            height: 600px;
            border: 1px solid lightgray;
        }
    </style>
</head>

<body>
<div id="myautomato"></div>

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
</body>
</html>