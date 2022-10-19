<!-- Styles -->
<style>
#graficoConocieron {
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
var root = am5.Root.new("graficoConocieron");


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
  svgPath: "M210 3185 l0 -2305 534 0 534 0 45 50 c82 91 77 27 77 1074 0 915 0 930 -20 972 -30 60 -132 177 -238 269 l-92 80 48 39 c90 75 240 234 271 287 l31 54 0 750 c0 723 -1 753 -20 824 -26 92 -62 163 -96 190 -26 21 -34 21 -550 21 l-524 0 0 -2305z m491 1858 c-17 -21 -71 -81 -121 -133 l-89 -95 -1 133 0 132 121 0 121 0 -31 -37z m348 0 c-20 -21 -136 -148 -259 -283 -123 -135 -240 -263 -262 -285 l-38 -40 0 95 0 95 208 227 207 227 90 0 89 1 -35 -37z m61 -250 l-1 -128 -256 -280 c-140 -154 -280 -307 -309 -340 l-54 -60 0 131 0 130 308 337 c169 185 308 336 310 337 1 0 2 -57 2 -127z m0 -425 l0 -113 -273 -315 c-149 -174 -289 -336 -310 -360 l-37 -44 0 132 0 131 308 340 c169 187 308 340 310 340 1 1 2 -50 2 -111z m-34 -602 c-19 -22 -74 -83 -123 -134 l-88 -93 -101 3 -101 3 221 256 221 255 3 -124 3 -124 -35 -42z m-196 -674 c0 -4 52 -64 115 -132 l114 -125 1 -772 0 -773 -310 0 -310 0 0 905 0 905 195 0 c107 0 195 -4 195 -8z"
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
<div class="container-m">

    <div id="graficoConocieron" class="contenedorGrafico"></div>


</div>