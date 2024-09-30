<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Location Tracker</title>
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            max-width: 500px;
        }

        header {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        #map {
            height: 300px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <header>Ambulance Location Tracker</header>
    <div id="map"></div>
</div>

<script>
    // Initialize the map centered on Pakistan
    const map = L.map('map').setView([30.3753, 69.3451], 5); // Center on Pakistan

   
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Initial position of the ambulance
    const ambulanceMarker = L.marker([33.6844, 73.0479]).addTo(map); // Starting at Islamabad

    // Array of coordinates for the ambulance route
    const route = [
        [33.6844, 73.0479], // Islamabad
        [33.6840, 73.0580], // Move to another point in Islamabad
        [33.6850, 73.0700], // Another point
        [33.5000, 72.8000], // Move towards another city
        [33.6000, 72.9000], // Another point
        [33.7000, 73.0000], // Final destination
    ];

    let index = 0;

    function moveAmbulance() {
        if (index < route.length) {
            ambulanceMarker.setLatLng(route[index]);
            map.setView(route[index]);
            index++;
        } else {
            index = 0; 
        }
    }

 
    setInterval(moveAmbulance, 2000);
</script>

</body>
</html>
