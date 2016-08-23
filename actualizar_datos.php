<?php
session_start();
$id_facebook = $_SESSION['id'];

$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

date_default_timezone_set('America/Caracas'); // CDT
$current_date = date('Y/m/d == H:i:s');

// Create connection
$conn = new mysqli('localhost', 'mgideasn_c_likes', 'c_likes2016', 'mgideasn_contador_likes');

// Check connection
if ($conn->connect_error) {
    echo json_encode(false);
}
else{
    $sql = "UPDATE ganadores SET cedula = '$cedula', telefono = '$telefono', email = '$email', direccion = '$direccion' WHERE id_users = '$id_facebook' AND cedula IS NULL";
    $respuesta = $conn->query($sql);
    echo json_encode(true);
    $conn->close();
}