<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
	//php validation
	require_once('../signupprocess.php');
	?>
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" onsubmit="return registerFormValidation();" method="post" name="registerForm">
					<span class="login100-form-title p-b-49">
						Register
					</span>

					<div class="wrap-input100 validate-input " data-validate = "Fullname is required">
						<span id="name_error" style="color: red;"><?php echo $fullname_error ?></span>
						<input class="input100" type="text" name="fullname" placeholder="Fullname">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<span id = "email_error" style="color: red;"><?php echo 	$email_error ?></span>
						<input class="input100" type="email" name="email" placeholder="Email">
						<span  class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input " data-validate="Password is required">
						<span id= "pass_error" style="color: red;"><?php echo $pasword_error ?></span>
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Country is required">
					<span id= "country_error" style="color: red;"><?php echo 	$country_error  ?></span>
						<input class="input100" type="text" name="country" placeholder="Country">
						<span  class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="City is required">
						<span id= "city_error" style="color: red;"><?php echo $city_error ?></span>
						<input class="input100" type="text" name="city" placeholder="City">
						<span  class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input " data-validate="Contact is required">
					<span id= "contact_error"  style="color: red;"><?php echo 	$contact_error ?></span>
						<input class="input100" type="text" name="contact" placeholder="Contact">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input " data-validate="Address is required">
						<span id= "address_error"  style="color: red;"><?php echo $address_error  ?></span>
						<input class="input100" type="text" name="address" placeholder="Address">
						<span  class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20  " data-validate="Image is required">
						<span class="label-input100">Profile Image <?php echo $image_error  ?></span>
						<input class="input100" type="file" name="image" id="image" accept="image/*">
						<span data-symbol="&#xf190;"></span>
					</div>
					
					
<script type="text/javascript" src="js/customvalidate.js"></script>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type= "submit" class="login100-form-btn" name = "register">
								Register
							</button>
						</div>
					</div>


					<div class="flex-col-c p-t-50">
						<span class="txt1 p-b-17">
							Already Registered? 
						</span>

						<a href="login.php" class="txt2">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>