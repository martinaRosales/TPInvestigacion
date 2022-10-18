<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/argentinaLow.js"></script>

<div id="chartdiv"></div>

<script>
    // Create root and chart
    var root = am5.Root.new("chartdiv");
    var chart = root.container.children.push(
        am5map.MapChart.new(root, {
            panX: "rotateX"
        })
    );

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
                    "name": "CiudadA"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [-65.1692, -27.9097]
                }
            },
            {
                "type": "Feature",
                "properties": {
                    "name": "CiudadB"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [-60.2944, -33.2567]
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
                fill: am5.color(0xffba00)
            })
        });
    });
</script>