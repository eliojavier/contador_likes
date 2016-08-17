<?php
$id_facebook = $_POST['id_facebook'];
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
    <form role="form" action="save_winner.php">
        <div class="form-group">
            <label for="nombre">Nombre: </label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Aceptar</button>
    </form>
</div>

</body>
</html>