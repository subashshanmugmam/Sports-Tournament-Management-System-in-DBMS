<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Tournament</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        #map {
            height: 400px;
            margin: 20px 0;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <h1>Welcome to Sports Tournament</h1>
    
    <div id="map"></div>
    
    <?php include 'includes/footer.php'; ?>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        const map = L.map('map').setView([20.5937, 78.9629], 5); // Centered on India

        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add markers for tournament locations
        const locations = [
            {name: 'Football World Cup', coords: [25.2854, 51.5310]}, // Qatar
            {name: 'Chess Championship', coords: [55.7558, 37.6173]}, // Moscow
            {name: 'Cricket World Cup', coords: [20.5937, 78.9629]}  // India
        ];

        locations.forEach(loc => {
            L.marker(loc.coords)
                .addTo(map)
                .bindPopup(loc.name);
        });
    </script>
</body>
</html>