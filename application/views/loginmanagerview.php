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

	/*#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}*/
	</style>
</head>
<body>

<div id="container">
  <!-- <h1>Test Value <?php print_r ($test);?></h1> -->

	<form name="loginForm" id="loginForm" method="post" enctype="multipart/form-data" action="<?php echo base_url().'loginmanager/checklogin';?>">
  <!-- Name input -->
  <div class="form-outline mb-4">
    <input type="text" id="u_name" name="u_name" class="form-control" />
    <label class="form-label" for="u_name">User Name</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="u_password" name="u_password" class="form-control" />
    <label class="form-label" for="u_password">Password</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

</form>

<dialog id="dialog">
	<h2>Error Alert</h2>
	<div id="innerText"></div>
	<button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
</dialog>
	
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
	
   var options1 = {

       success:        showLoginResponse, 
       clearForm:     false     
     
    };
   
    $('#loginForm').ajaxForm(options1);
});
function showLoginResponse(responseMsg) {
	var tempArray = new Array();
   	tempArray = responseMsg.split("|",2);
   	if(tempArray[0].search("sucess")== -1){
		
		window.location="<?php echo base_url().'/assetManager/display'; ?>";
   
   } else {

   	// display error modal

   	var errorMsg="<p style='padding-left:3px'>"+tempArray[1]+"</p>";

   	window.dialog.showModal();

   	$('#innerText').html(errorMsg);
	document.getElementById('innerText').style.display = '';

   }
}
</script>

</body>
</html>
