<?php
//$id_facebook = $_POST['id_facebook'];
session_start();
$id_facebook = $_SESSION['id'];
$like = $_POST['like'];

date_default_timezone_set('America/Caracas'); // CDT
$current_date = date('Y/m/d');
$day = date('d');
$month = date('m');
$year = date('Y');

$ganador = 0;

// Create connection
$conn = new mysqli('localhost', 'mgideasn_c_likes', 'c_likes2016', 'mgideasn_contador_likes');

// Check connection
if ($conn->connect_error) {
    $data = array(
        'error' => 'true',
        'message' => 'Database connection failed'
    );
    echo json_encode($data);
}
else {
    //guardar el like del usuario conectado
    $sql = "UPDATE likes SET likes = $like WHERE id_facebook = \"$id_facebook\"";
    $like_guardado = $conn->query($sql);

    //obtener el número de like sembrado
    $sql = "SELECT  id, like_sembrado FROM siembras WHERE fecha = '$current_date' AND STATUS = 1 LIMIT 1";
    $query_response = $conn->query($sql);
    $row = $query_response->fetch_array(MYSQLI_ASSOC);
    $id_siembra = (int)$row["id"];
    $like_sembrado = (int)$row["like_sembrado"];
    
    if ($like == $like_sembrado) {
        $sql = "INSERT INTO ganadores (fecha, id_siembras, id_users) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $full_date, $id_siembra, $id_facebook);
        $full_date = date('Y/m/d == H:i:s');
        $stmt->execute();

        $sql = "UPDATE siembras SET STATUS = 0 WHERE id = $id_siembra";
        $cambiar_status = $conn->query($sql);
        if($cambiar_status==true){
            $ganador = 1;    
        }
    }
    
    echo json_encode($ganador);
}

    
