<?php
    session_start();
    $id_facebook = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
	<div class="container">
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-4 alt">
				Columna1
			</div>	

			<div class="col-xs-12 col-md-4 debug bg alt">
				<span id="custom"></span>
				<script>
					$(document).ready(function(){
                        var id_facebook = "<?php echo $id_facebook; ?>";
                        var init;

                        $.ajax({
                            type: "POST",
                            url: "get_likes.php",
                            success: function (response) {
                                $('#valor').val(response);
                                init = $("#valor").val();
                            },
                            error: function (response) {
                                console.log(response);
                            }
                        });

						$("#buton").click( function(){

							init = $("#valor").val();
							var limit = init;

							limit++;
							$('#custom').addClass('counter-analog2').counter({
								initial: init,
								direction: 'up',
								interval: '1',
								format: '9999',
								stop: limit
							});
							init++;
							$("#valor").val(init);

                            $.ajax({
                                data: {like: init},
                                type: "POST",
                                url: "save_like.php",
								beforeSend: function () {
									$("#buton").hide("slow");
								},
                                success: function(response){
                                    $("#buton").show("slow");
									if (response == 1){
                                        modal();
									}
                                },
                                error:function(response){
                                    console.log('error: ' + response);//error
                                }
                            });
						});

                        $("#guardar").click(function() {
                            $.ajax({
                                data:{id_facebook: id_facebook, cedula: $("#cedula").val() , telefono: $("#telefono").val(), email: $("#email").val(), direccion: $("#direccion").val()},
                                type: "POST",
                                url: "actualizar_datos.php",
                                success:function (response) {
                                    if(response=="true"){
                                        window.location.href =  "contador.php";
                                    }
                                },
                                error:function (response) {
                                    console.log (response);
                                }
                            });
                        });
					});

                    function modal() {
                        $("#myModal").modal();
                    }

    			</script>


    			<div id="buton" class="btn btn-primary" >Like!</div>
    			<input id="valor" name="ivalor" type="hidden" value="0"/>
			</div>

			<div class="hidden-xs hidden-sm col-md-4 alt">
				Columna3
			</div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">¡Ganaste!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda deserunt, esse itaque laborum quis rerum! Esse expedita illo in ipsa iste modi molestiae omnis placeat praesentium quaerat, rem tempora.</p>
                            <form role="form">
                                <div class="form-group">
                                    <label for="cedula">Cédula: </label>
                                    <input id="cedula" name="cedula" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono: </label>
                                    <input id="telefono" name="telefono" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input id="email" name="email" type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <textarea id="direccion" name="direccion" id="direccion" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="guardar" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Fin modal -->
        </div>
		</div>
	</div>
</body>
</html>