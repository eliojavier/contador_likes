<?php
$id_facebook = $_POST['id_facebook'];
$like = $_POST['like'];

// Create connection
$conn = new mysqli('localhost', 'mgideasn_c_likes', 'c_likes2016', 'mgideasn_contador_likes');

// Check connection
if ($conn->connect_error) {
    echo json_encode(false);
}

//guardar el like del usuario conectado
$sql = "UPDATE users SET likes = $like WHERE id_facebook = \"$id_facebook\"";
$like_saved = $conn->query($sql);

//obtener el número de like ganador
$sql = "SELECT winner_like FROM wlikes WHERE DAY(DATE) = '16' AND MONTH(DATE) = '08' AND YEAR(DATE) = '2016'"; //devuelve false en caso de error
$query_response = $conn->query($sql);
$row = $query_response->fetch_array(MYSQLI_NUM);
$winner_like = (int)$row[0];

//obtener el status
$sql = "SELECT status FROM wlikes WHERE DAY(DATE) = '16' AND MONTH(DATE) = '08' AND YEAR(DATE) = '2016'";
$query_response = $conn->query($sql);
$row = $query_response->fetch_array(MYSQLI_NUM);
$status = (int)$row[0];

//si es like ganador y está activo el concurso, es ganador y aumento el num de ganadores
if($like==$winner_like and $status==1){
    $sql = "UPDATE wlikes SET cur_winners = cur_winners + 1";
    $query_response = $conn->query($sql);

    $sql = "SELECT cur_winners FROM wlikes WHERE DAY(DATE) = 16 AND MONTH(DATE) = 08 AND YEAR(DATE)=2016";
    $query_response = $conn->query($sql);
    $row = $query_response->fetch_array(MYSQLI_NUM);
    $cur_winners = (int)$row[0];

    $sql = "SELECT max_winners FROM wlikes WHERE DAY(DATE) = 16 AND MONTH(DATE) = 08 AND YEAR(DATE)=2016";
    $query_response = $conn->query($sql);
    $row = $query_response->fetch_array(MYSQLI_NUM);
    $max_winners = (int)$row[0];

    if ($cur_winners == $max_winners){
        $sql = "UPDATE	wlikes SET STATUS = 0 WHERE DAY(DATE) = 16 AND MONTH(DATE) = 08 AND YEAR(DATE) = 2016";
        $status_updated = $conn->query($sql);
    }

    echo json_encode(1);
}
else{
    echo json_encode(0);
}

$conn->close();
