<?php
$obj_controlador = new C_VentaProducto();

$result = $obj_controlador->buscar(null);
$data = array();

$array = $obj_controlador->cantProductosVendidos();
foreach ($array as $row) {
    $dato = array(
        'NOMBRE' => $row['nombre'],
        'CANTIDAD' => $row['cantidad']
    );
    $data[] = $dato;
}

$data = json_encode(array_values($data));
//print_r($data);
?>


<script>
    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("PopularidadProductos");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
            layout: root.verticalLayout
        }));


        // Create series
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
        var series = chart.series.push(am5percent.PieSeries.new(root, {
            valueField: "CANTIDAD",
            categoryField: "NOMBRE"
        }));


        // Set data
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
        var data = <?php echo $data; ?>;
        series.data.setAll(data);


        // Play initial series animation
        // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
        series.appear(1000, 100);

    }); // end am5.ready()
</script>

<!-- HTML -->
<div id="PopularidadProductos" class="contenedorGrafico d-none"></div>