<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transport_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['lat']) && isset($_GET['lng'])) {
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $timestamp = date('Y-m-d H:i:s');

    $sql = "INSERT INTO vehicle_locations (latitude, longitude, timestamp)
            VALUES ('$lat', '$lng', '$timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo "✔ Location stored successfully";
    } else {
        echo "❌ Database Error: " . $conn->error;
    }
} else {
    echo "❌ Invalid Request";
}

$conn->close();
?>
