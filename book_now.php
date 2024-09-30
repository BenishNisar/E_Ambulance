<?php
session_start();
include('includes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize the success message variable
$success = false;

// Check if user is logged in
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospital_name = $_POST['hospital_name'];
    $pickup_address = $_POST['pickup_address'];
    $dropoff_address = $_POST['dropoff_address'];
    $phone = $_POST['phone'];
    $request_type = $_POST['request_type'];
    $vehicle_number = $_POST['vehicle_number']; // Get vehicle tracking number

    // Fetch user details from the session
    $useremail = $_SESSION['login'];
    $sqlUser = "SELECT id, FullName FROM tblusers WHERE EmailId = :useremail";
    $queryUser = $dbh->prepare($sqlUser);
    $queryUser->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $queryUser->execute();
    $user = $queryUser->fetch(PDO::FETCH_OBJ);

    if ($user) {
        $user_id = $user->id;
        $fullName = $user->FullName;

        // Insert emergency request
        $sql = "INSERT INTO emergency_requests (user_id, FullName, hospital_name, pickup_address, dropoff_address, phone, request_type, vehicle_number) VALUES 
        (:user_id, :fullName, :hospital_name, :pickup_address, :dropoff_address, :phone, :request_type, :vehicle_number)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $query->bindParam(':hospital_name', $hospital_name, PDO::PARAM_STR);
        $query->bindParam(':pickup_address', $pickup_address, PDO::PARAM_STR);
        $query->bindParam(':dropoff_address', $dropoff_address, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':request_type', $request_type, PDO::PARAM_STR);
        $query->bindParam(':vehicle_number', $vehicle_number, PDO::PARAM_STR); // Bind vehicle number

        // Execute the query
        if ($query->execute()) {
            $success = true; // Set success to true
        } else {
            echo "Error in booking. Please try again.";
        }
    } else {
        echo "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Booking Form</title>
    <link rel="shortcut icon" href="assets/images/Rapid_Rescue.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
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

        .fields {
            display: flex;
            flex-direction: column;
        }

        .input-field {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #4070f4;
        }

        button {
            background-color: #4070f4;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #265df2;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .image-container {
            display: flex;
            justify-content: center;
            margin-bottom: 0px;
        }

        /* Map styles */
        #pickup-map, #dropoff-map {
            height: 300px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="assets/images/Rapid_Rescue.png" width="200px" height="150px">
        </div>
        <header>Book an Ambulance</header>
        <form method="POST">
            <div class="fields">
                <div class="input-field">
                    <label for="hospital_name">Hospital</label>
                    <input type="text" id="hospital_name" name="hospital_name" placeholder="Enter hospital name" required>
                </div>
                <div class="input-field">
                    <label for="pickup_address">Pick Up Address</label>
                    <input type="text" id="pickup_address" name="pickup_address" placeholder="Enter pick-up address" required>
                    <div id="pickup-map"></div>
                </div>
                <div class="input-field">
                    <label for="dropoff_address">Drop Off Address</label>
                    <input type="text" id="dropoff_address" name="dropoff_address" placeholder="Enter drop-off address" required>
                    <div id="dropoff-map"></div>
                </div>
                <div class="input-field">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="input-field">
                    <label for="vehicle_number">Vehicle Tracking Number</label>
                    <input type="text" id="vehicle_number" name="vehicle_number" placeholder="Enter vehicle tracking number" required>
                </div>
                <div class="input-field">
                    <label for="request_type">Request Type</label>
                    <select id="request_type" name="request_type" required>
                        <option disabled selected>Select request type</option>
                        <option value="Emergency">Emergency</option>
                        <option value="Non_Emergency">Non-Emergency</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Your booking has been successful!</p>
            <?php if ($success): ?>
                <p>Tracking Number: <?php echo htmlspecialchars($vehicle_number); ?></p>
                <p>Hospital: <?php echo htmlspecialchars($hospital_name); ?></p>
                <p>Pickup Address: <?php echo htmlspecialchars($pickup_address); ?></p>
                <p>Dropoff Address: <?php echo htmlspecialchars($dropoff_address); ?></p>
                <p>Phone: <?php echo htmlspecialchars($phone); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Initialize pickup map
        var pickupMap = L.map('pickup-map').setView([24.8607, 67.0011], 12); // Default location (Karachi)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(pickupMap);

        var pickupMarker = L.marker([24.8607, 67.0011]).addTo(pickupMap); // Default marker

        // Function to update pickup marker
        function updatePickupMarker(lat, lon) {
            pickupMarker.setLatLng([lat, lon]);
            pickupMap.setView([lat, lon], 15);
        }

        // Initialize dropoff map
        var dropoffMap = L.map('dropoff-map').setView([24.8607, 67.0011], 12); // Default location (Karachi)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(dropoffMap);

        var dropoffMarker = L.marker([24.8607, 67.0011]).addTo(dropoffMap); // Default marker

        // Function to update dropoff marker
        function updateDropoffMarker(lat, lon) {
            dropoffMarker.setLatLng([lat, lon]);
            dropoffMap.setView([lat, lon], 15);
        }

        // Add event listener to update markers on input change
        document.getElementById('pickup_address').addEventListener('change', function() {
            // Here, you would ideally use a geocoding service to get the coordinates based on the address
            // For demonstration, let's assume coordinates for Karachi
            updatePickupMarker(24.8607, 67.0011); // Replace with actual coordinates
        });

        document.getElementById('dropoff_address').addEventListener('change', function() {
            // Same as above for dropoff
            updateDropoffMarker(24.8607, 67.0011); // Replace with actual coordinates
        });
    </script>
</body>
</html>
