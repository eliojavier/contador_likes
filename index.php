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
	<script>
		// This is called with the results from from FB.getLoginStatus().
		function statusChangeCallback(response) {
			console.log('statusChangeCallback');
			console.log(response);
			// The response object is returned with a status field that lets the
			// app know the current login status of the person.
			// Full docs on the response object can be found in the documentation
			// for FB.getLoginStatus().
			if (response.status === 'connected') {
				// Logged into your app and Facebook.
				testAPI();
			} 
			else if (response.status === 'not_authorized') {
				// The person is logged into Facebook, but not your app.
				document.getElementById('status').innerHTML = 'Please log ' +
					'into this app.';
			} 
			else {
				// The person is not logged into Facebook, so we're not sure if
				// they are logged into this app or not.
				document.getElementById('status').innerHTML = 'Please log ' +
					'into Facebook.';
			}
		}

		// This function is called when someone finishes with the Login
		// Button.  See the onlogin handler attached to it in the sample
		// code below.
		function checkLoginState() {
			FB.getLoginStatus(function (response) {
				statusChangeCallback(response);
			});
		}

		window.fbAsyncInit = function () {
			FB.init({
				appId: '277164629321853',
				cookie: true,  // enable cookies to allow the server to access
							   // the session
				xfbml: true,  // parse social plugins on this page
				version: 'v2.5' // use graph api version 2.5
			});

			// Now that we've initialized the JavaScript SDK, we call
			// FB.getLoginStatus().  This function gets the state of the
			// person visiting this page and can return one of three states to
			// the callback you provide.  They can be:
			//
			// 1. Logged into your app ('connected')
			// 2. Logged into Facebook, but not your app ('not_authorized')
			// 3. Not logged into Facebook and can't tell if they are logged into
			//    your app or not.
			//
			// These three cases are handled in the callback function.

			FB.getLoginStatus(function (response) {
				statusChangeCallback(response);
			});

		};

		// Load the SDK asynchronously
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		// Here we run a very simple test of the Graph API after login is
		// successful.  See statusChangeCallback() for when this call is made.
		function testAPI() {
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me', function (response) {
				console.log('Successful login for: ' + response.name);
				document.getElementById('status').innerHTML =
					'Thanks for logging in, ' + response.name + '!';
			});
		}
	</script>

	<!--
  	Below we include the Login Button social plugin. This button uses
  	the JavaScript SDK to present a graphical Login button that triggers
  	the FB.login() function when clicked.
	-->

	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button>

	<div id="status">
	</div>
	
	<div class="container">
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-4 alt">
				<div
			  		class="fb-like"
			  		data-share="true"
			  		data-width="450"
			  		data-show-faces="true">
				</div>
				aplicación
			</div>	

			<div class="col-md-4 debug bg alt">
				<span id="custom"></span>
				<script>
					$(document).ready(function(){		
						$("#buton").click( function(){
							var init = $("#valor").val();
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
						});				
					});   
    			</script>
    			<div id="buton" style="height:12px; width:30px; background:#CC6600;">Like!</div>
    			<input id="valor" name="ivalor" type="hidden" value="0"/>
			</div>

			<div class="hidden-xs hidden-sm col-md-4 alt">
				aplicación3
			</div>				
		</div>
	</div>
</body>
</html>