<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([am5themes_Animated.new(root)]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/
var chart = root.container.children.push(am5percent.SlicedChart.new(root, {
  layout: root.verticalLayout
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/#Series
var series = chart.series.push(am5percent.PictorialStackedSeries.new(root, {
  alignLabels: true,
  orientation: "vertical",
  valueField: "value",
  categoryField: "category",
  svgPath:
    "m 89.600216,31.476115 c -11.069856,0.0026 -19.776571,0.04703 -19.776571,0.04703 L 69.666549,275.41885 c 0,0 28.775534,0.83444 53.564171,0.48163 4.68354,-0.0667 9.96196,-7.6888 10.02626,-12.37237 0.61716,-44.96398 0.34473,-57.71741 -0.24133,-96.88349 -0.0595,-3.97725 -18.58439,-20.77444 -18.58439,-20.77444 0,0 19.11839,-13.78075 19.07739,-21.01526 -0.23856,-42.097168 0.13832,-44.375319 -0.16795,-73.436865 -0.0631,-5.989589 -1.80493,-19.59656 -9.78493,-19.737813 -9.45248,-0.167317 -22.8857,-0.206711 -33.955554,-0.204122 z M 84.941069,53.27065 96.9238,53.397257 85.103333,66.101392 Z m 30.208491,0 -30.118058,33.95245 -0.09043,-9.752893 21.925278,-24.036776 z m 3.05821,8.274947 0.19017,12.026656 -33.393826,36.154387 0.09922,-11.468038 z m -0.0718,23.323641 0.0992,10.303764 -33.159216,38.356318 -0.09922,-12.23543 z m 0.42427,21.510312 v 13.80485 l -12.99301,14.29215 -11.440646,0.0548 z m -13.00851,51.3948 12.38115,14.07769 0.27751,80.92271 -33.171106,0.12247 -0.01189,-95.0898 z"
}));

series.labelsContainer.set("width", 100);
series.ticks.template.set("location", 0.6);


// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/#Setting_data
series.data.setAll([
  { category: "Instagram", value: 30 },
  { category: "Eventos", value: 50 },
  { category: "Recomendacion", value: 15 },
  { category: "Otro", value: 5 }
]);


// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
chart.set("layout", root.verticalLayout);

var legend = chart.children.moveValue(am5.Legend.new(root, {
  paddingBottom: 15,
  paddingTop: 15,
  x: am5.percent(50),
  dx: -150,
  centerX: am5.p50
}), 0);




// Play  initial se ries animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
chart.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="VentasMensuales" class="container-m">

    <input type="hidden" name="grafico_1" id="gafico_1">
    <div id="chartdiv" class="contenedorGrafico"></div>


</div>