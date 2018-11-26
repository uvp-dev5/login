<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <meta name="google-signin-client_id" content="<?php echo $this->config->item('google_oauth');?>">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<div class="row">
    <div class="col login-form">
        <p>Para acceder a esta sección necesitas ser registrado por el administrador con tu cuenta de correo institucional o una cuenta Gmail personal.</p>
        <p>Da clic para continuar.</p>
        <button type="button" id="g-custom-btn" class="btn g-btn">Sign in with Gmail</button>
        <form id="login" action="<?php echo site_url('login/signin') ;?>" method="post">
            <input type="hidden" name="token" id="token">
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
	var googleUser = {};
	var startApp = function() {
		gapi.load('auth2', function() {
			//Retrieve GoogleAuth library and set up the client.
			auth2 = gapi.auth2.init({
				client_id: '<?php echo $this->config->item('google_oauth')?>',
				cookiepolicy: 'single_host_origin',
		        //If you need more info than profile and email, add scopes
		        //scope: 'additional_scope'
		    });
		    if ( document.getElementById('g-custom-btn') ) {
		    	attachSignin(document.getElementById('g-custom-btn'));
		    }
		    jQuery('#g-logout-btn').click(function() {
		    	var auth2 = gapi.auth2.getAuthInstance();
		    	auth2.signOut().then(function () {
		    		jQuery('#logout').submit();
		    	});
		    });
		});
	};
	function attachSignin(element) {
		auth2.attachClickHandler(
			element, 
			{},
			function(googleUser) {
				document.getElementById('token').value = googleUser.getAuthResponse().id_token;
				document.getElementById('login').submit();
	        }, 
	        function(error) {
	        	alert(JSON.stringify(error, undefined, 2));
	        }
		);
	}
	window.onload = function() {
		startApp();
	};
</script>
</body>
</html>