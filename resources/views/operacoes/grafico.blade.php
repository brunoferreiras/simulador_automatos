<!doctype html>
<html>
<head>
    <title>Gráfico</title>
    <script src="http://visjs.org/dist/vis.js"></script>
    <link href="http://visjs.org/dist/vis-network.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        html, body {
            font: 10pt arial;
        }

        #mynetwork {
            width: 100%;
            height: 600px;
            border: 1px solid lightgray;
        }
    </style>
</head>

<body>
<div id="mynetwork"></div>

<script type="text/javascript">
    var nodes = new vis.DataSet([
        {id: 1, label: '0'},
        {id: 2, label: '1'},
        {id: 3, label: '2'},
        {id: 4, label: '3'}
    ]);

    // create an array with edges
    var edges = new vis.DataSet([
        {from: 1, to: 1, label: 'a'},
        {from: 1, to: 2, label: 'b'},
        {from: 2, to: 1, label: 'a'},
        {from: 2, to: 4, label: 'b'},
        {from: 2, to: 3, label: 'c'},
        {from: 4, to: 1, label: 'a'}
    ]);

    // create a network
    var container = document.getElementById('mynetwork');
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
</script>
</body>
</html>