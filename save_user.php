<?php
$id_facebook = $_POST['id_facebook'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

$user_saved = false;

//date_default_timezone_set('America/Caracas'); // CDT
//$current_date = date('d/m/Y == H:i:s');

// Create connection
$conn = new mysqli('localhost', 'mgideasn_c_likes', 'c_likes2016', 'mgideasn_contador_likes');

// Check connection
if ($conn->connect_error) {
    echo json_encode($user_saved);
}
else{
    $sql = "INSERT INTO users (id_facebook, first_name, last_name, email) VALUES ('$id_facebook', '$first_name', '$last_name', '$email')";

    $user_saved = $conn->query($sql);
    $conn->close();

    echo json_encode($user_saved);
}

