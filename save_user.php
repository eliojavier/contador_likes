<?php
$id_facebook = $_POST['id_facebook'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

$user_saved = false;

// Create connection
$conn = new mysqli('localhost', 'mgideasn_c_likes', 'c_likes2016', 'mgideasn_contador_likes');

// Check connection
if ($conn->connect_error) {
    echo json_encode($user_saved);
}

$sql = "INSERT INTO users (id_facebook, first_name, last_name, email) VALUES ('$id_facebook', '$first_name', '$last_name', '$email')";

$user_saved = $conn->query($sql);
$conn->close();

echo json_encode($user_saved);
