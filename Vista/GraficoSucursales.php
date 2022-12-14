<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/argentinaLow.js"></script>

<style>
    #chart_sucursales {
        padding: 0% 15%;
    }
</style>


<div class="container-fluid">
    <div id="chart_sucursales" class="grafico contenedorGrafico"></div>
</div>
<script>
    // Create root and chart
    var root = am5.Root.new("chart_sucursales");
    var chart = root.container.children.push(
        am5map.MapChart.new(root, {
            width: 200,
            panX: "none",
            wheelY: "none"
        })
    );
    var cont = chart.children.push(am5.Container.new(root, {
        layout: root.horizontalLayout,
        x: 20,
        y: 40
    }));

    // Create polygon series
    var polygonSeries = chart.series.push(
        am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_argentinaLow,
            exclude: ["AQ"]
        })
    );

    var sucursales = {
        "type": "FeatureCollection",
        "features": [{
                "type": "Feature",
                "properties": {
                    "name": "San Luis"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [-66.006, -33.5555]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "name": "Neuquen"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [-69.5065, -38.5007]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "name": "Rio Negro"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [-67.5065, -40.5007]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "name": "Buenos Aires"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [-58.5065, -37.5007]
                }
            }
        ]
    };

    var pointSeries = chart.series.push(
        am5map.MapPointSeries.new(root, {
            geoJSON: sucursales
        })
    );
    pointSeries.bullets.push(function() {
        return am5.Bullet.new(root, {
            sprite: am5.Circle.new(root, {
                radius: 5,
                fill: am5.color(0xe91e63),
                tooltipText: `{name}`
            })
        });

    });

    root.interfaceColors.set("text", am5.color(0xffffff));

    //exporting
    var exporting = am5plugins_exporting.Exporting.new(root, {
        menu: am5plugins_exporting.ExportingMenu.new(root, {}),
        htmlOptions: {
            disabled: true
        }
    });
</script>