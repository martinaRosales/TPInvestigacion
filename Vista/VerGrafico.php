<?php
include('Common/Header.php');
include('../Control/C_Producto.php');

$obj_controlador = new C_Producto();

$result = $obj_controlador->buscar(null);
$data = array();

foreach ($result as $row) {
    $dato = array(
        'NOMBRE' => $row->getNombre(),
        'STOCK' => $row->getPrecio()
    );
    $data[] = $dato;
}

$data = json_encode(array_values($data));

?>
<<<<<<< HEAD
<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/plugins/exporting.js"></script>
=======

<div class="container">
    Aca se puede ver el grafico y descargarlo
    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
            background-color: rgba(233, 30, 99, 0.3);
        }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
>>>>>>> 128ac6b4ee362a96f36d8b7bd7a5a708dc15b51f

    <!-- Chart code -->
    <script>
        am5.ready(function() {

<<<<<<< HEAD
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv_1");
=======
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");
>>>>>>> 128ac6b4ee362a96f36d8b7bd7a5a708dc15b51f


            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true
            }));

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);


            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });
            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "NOMBRE",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    min: 300,
                    max: 2500,
                    renderer: am5xy.AxisRendererY.new(root, {})
                })
            );

            root.interfaceColors.set("text", am5.color(0xffffff));


            // Create series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "STOCK",
                sequencedInterpolation: true,
                categoryXField: "NOMBRE",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5
            });
            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });


            // Set data
            var data = <?php echo $data; ?>;

<<<<<<< HEAD
        var exporting = am5plugins_exporting.Exporting.new(root, {
        menu: am5plugins_exporting.ExportingMenu.new(root, {}),
        htmlOptions: {
        disabled: true
         }
        });

        xAxis.data.setAll(data);
        series.data.setAll(data);
=======
            xAxis.data.setAll(data);
            series.data.setAll(data);
>>>>>>> 128ac6b4ee362a96f36d8b7bd7a5a708dc15b51f


            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);

<<<<<<< HEAD
    }); // end am5.ready()

    
</script>

<!-- HTML -->
<div class="container-fluid">
<div class="container col-md-12" style="margin:30px;background-color: lightblue;">
<form method="POST" action="AccionDescargarPDF.php">
    <input type="hidden" name="grafico_1" id="gafico_1">
    <div id="chartdiv_1"></div>
    <div>
        <button class="btn btn-primary" type="submit">Descargar PDF</button>
    </div>
</form>
</div>
</div>
=======
        }); // end am5.ready()
    </script>

    <!-- HTML -->
    <form action="AccionDescargarPDF.php">
        <div id="chartdiv" class="text-light"></div>
        <div>
            <button class="btn btn-primary" type="submit">Descargar PDF</button>
        </div>
    </form>
</div>
<?php
include('Common/Footer.php');
?>
>>>>>>> 128ac6b4ee362a96f36d8b7bd7a5a708dc15b51f
