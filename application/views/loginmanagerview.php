<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Integrated Assest Managament System</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

  .required:after {
    content:" *";
    color: red;
  }

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		padding: 10px;
	}

	.loader-img-login {
    background: url('../asset-demo/images/loader.svg');
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: 60px;
    background-color: #FFF;
    box-shadow: 0px 2px 8px #AAA;
    border-radius: 50%;
    width: 54px;
    height: 54px;
    top: 20%;
    left: 0;
    right: 0;
    margin: 0 auto;
    position: absolute;
    z-index: 9999;
    display : none;
    
}
.error-div {
    display: none;
    border-radius: 5px;
    opacity: 0.9;
    position: absolute;
    background-color: #444;
    bottom: 30%;
    width: 73%;
    left: 0;
    right: 0;
    margin: 0 auto;
    color: #FFF;
    font: 14px 'Roboto';
    padding: 5px 10px;
    z-index: 999;
}
.error {
    background-color: #F2DEDE;
    border: 1px solid rgb(229, 74, 74);
    color: rgb(229, 74, 74);
    font: 15px 'Roboto';
    padding: 15px;
    border-radius: 2px;
}
	</style>
</head>
<body>

<div id="container">
  <!-- <h1>Test Value <?php //print_r ($test);?></h1> -->

	<form name="loginForm" id="loginForm" method="post" enctype="multipart/form-data" action="">
  <!-- Name input -->
  <div class="form-outline mb-4">
    <input type="text" id="u_name" name="u_name" class="form-control" />
    <label class="form-label required" for="u_name">User Name</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="u_password" name="u_password" class="form-control" />
    <label class="form-label required" for="u_password">Password</label>
  </div>

  <!-- Submit button -->
  <button id="submitButton" type="button" onclick ="submitLoginRequest();" class="btn btn-primary btn-block mb-4">Sign in</button>
  <div class="loader-img-login"></div>
  <div id="errorDiv"></div>

</form>

<dialog id="dialog">
	<h2>Error Alert</h2>
	<div id="innerText"></div>
	<button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
</dialog>
	
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

function submitLoginRequest(){ 
  
  $('.loader-img-login').show();  
      
  $("#submitButton").attr("disabled");
  var u_name = $('#u_name').val();
  var u_password = $('#u_password').val();
  if(u_name != '' && u_password!= '') {

  
  $.post("<?php echo base_url().'loginmanager/checklogin';?>", {u_name:u_name,u_password:u_password}, function(msg) { 
    showLoginResponse(msg);

    });
	} else {

				$('#errorDiv').show();

				$('#errorDiv').html('<div class="error">Invalid Username/Password</div>');

				$('.loader-img-login').hide();
	        
	    }
}
function showLoginResponse(responseMsg) {

	var obj=JSON.parse(responseMsg);
  
  if(obj.status=="Success"){
		
		window.location="<?php echo base_url().'assetManager/display_grid'; ?>";
   
   } else {

   		$('#errorDiv').show();

				$('#errorDiv').html('<div class="error">'+obj.errorMsg+'</div>');

				$('.loader-img-login').hide();

   }
}
</script>

</body>
</html>
