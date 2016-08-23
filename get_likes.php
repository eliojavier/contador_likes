<?php
$id_facebook = $_POST['id_facebook'];

$user_saved = false;

date_default_timezone_set('America/Caracas'); // CDT
$current_date = date('Y/m/d');
$day = date('d');
$month = date('m');
$year = date('Y');

// Create connection
$conn = new mysqli('localhost', 'mgideasn_c_likes', 'c_likes2016', 'mgideasn_contador_likes');

// Check connection
if ($conn->connect_error) {
    echo json_encode($user_saved);
}
else{
    $sql = "SELECT COUNT(likes) FROM likes WHERE fecha = '$current_date' AND id_facebook = '$id_facebook'";
    $query_response = $conn->query($sql);
    $row = $query_response->fetch_array(MYSQLI_NUM);
    $tiene_likes = (int)$row[0];

    if ($tiene_likes==0){
        $sql = "INSERT INTO likes (likes, fecha, id_facebook) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $likes, $current_date, $id_facebook);

        $likes = 0;
        $current_date = date('Y/m/d');
        $stmt->execute();
    }

    
    $sql = "SELECT likes FROM likes WHERE fecha = '$current_date' AND id_facebook = '$id_facebook'";
    $query_response = $conn->query($sql);
    $row = $query_response->fetch_array(MYSQLI_NUM);
    $likes = (int)$row[0];

    echo json_encode($likes);
}

