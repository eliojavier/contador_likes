<?php
    $id_facebook = $_GET['id'];
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
	<div class="container">
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-4 alt">
				Columna1
			</div>	

			<div class="col-md-4 debug bg alt">
				<span id="custom"></span>
				<script>
					$(document).ready(function(){		
						$("#buton").click( function(){
                            document.getElementById("buton").disable = true;

							var init = $("#valor").val();
							var limit = init;

                            var id_facebook = "<?php echo $id_facebook; ?>";
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
							//Aquí esta el valor del contador
                            console.log('contador: ' + init);

    //guardo el like del usuario
    //tengo init (el num de like)
    //obtengo status en la fecha de hoy
    //si status == 1 -> comparo los likes
    //si init == like_premiado -> es ganador, aumento cur_winner en 1. Si cur_winner == max_winner -> status == 0

                            //guardo contador
                            $.ajax({
                                data: {id_facebook: id_facebook, like: init},
                                type: "POST",
                                url: "save_like.php",
                                success: function(response){
                                    console.log(response);
									if (response == 1){
										window.location.href =  "formulario.php?id=" + id_facebook;
									}
                                },
                                error:function(response){
                                    console.log('error: ' + response);
                                }
                            });
						});				
					});   
    			</script>
    			<div id="buton" class="btn btn-primary" >Like!</div>
    			<input id="valor" name="ivalor" type="hidden" value="0"/>
			</div>

			<div class="hidden-xs hidden-sm col-md-4 alt">
				Columna3
			</div>				
		</div>
	</div>
</body>
</html>