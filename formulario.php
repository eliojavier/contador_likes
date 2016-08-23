<?php
session_start();
//$id_facebook = $_GET['id'];
$id_facebook = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Contador de likes
	</title>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/jquery.counter-analog.css"/>
	<link rel="stylesheet" type="text/css" href="js/jquery.counter-analog2.css"/>
	<link rel="stylesheet" type="text/css" href="js/jquery.counter-analog3.css"/>

	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<script src="js/jquery.counter.js"></script>
</head>

<body>
<div class="col-md-2 col-md-offset-5">
    <form role="form" method="post" action="actualizar_datos.php">
        <input name="id_facebook" type="hidden" value="<?php echo $id_facebook; ?>">
        <div class="form-group">
            <label for="cedula">Cédula: </label>
            <input name="cedula" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono: </label>
            <input name="telefono" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" id="direccion" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Aceptar</button>
    </form>
</div>

</body>
</html>