<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenRouteService Integration</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://cdn.openrouteservice.org/js/v1/or-map.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = new ORMap({
                container: 'map',
                zoom: 12,
                center: { lat: 37.7749, lon: -122.4194 }, // San Francisco
                apikey: '5b3ce3597851110001cf624861a6dc3b44ba4091b737bb4b3c461b08'
            });

            // Add a marker
            var marker = new ORMarker({
                position: { lat: 37.7749, lon: -122.4194 },
                icon: 'https://openrouteservice.org/styles/orv1/marker-15.png'
            });
            map.addMarker(marker);
        });
    </script>
</head>
<body>
    <h1>OpenRouteService Integration</h1>
    <p>This page displays a map using the OpenRouteService API.</p>
    <div id="map"></div>
</body>
</html>