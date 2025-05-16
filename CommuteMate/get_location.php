<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transport_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die(json_encode(['error' => 'Database connection failed']));
}

// Get the most recent location
$sql = "SELECT latitude, longitude FROM vehicle_locations ORDER BY timestamp DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo json_encode(['lat' => $row['latitude'], 'lng' => $row['longitude']]);
} else {
  echo json_encode(['error' => 'No location data']);
}

$conn->close();
?>
