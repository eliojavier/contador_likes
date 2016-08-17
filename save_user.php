<?php
$id_facebook = $_POST['id_facebook'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

//echo ($id_facebook);
//echo ($first_name);
//echo ($last_name);
//echo ($email);
//echo ($birthday);

$respuesta = 0;

// Create connection
$conn = new mysqli('localhost', 'mgideasn_c_likes', 'c_likes2016', 'mgideasn_contador_likes');

// Check connection
if ($conn->connect_error) {
    echo json_encode(false);
}

$sql = "INSERT INTO users (id_facebook, first_name, last_name, email) VALUES ('$id_facebook', '$first_name', '$last_name', '$email')";

$respuesta = $conn->query($sql);
$conn->close();

echo json_encode($respuesta);

//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

