<?php
session_start();

require_once('database/dbconnectclass.php');

// declare variables to hold errors
$fullname_error = "";
$pasword_error = "";
$country_error = "";
$city_error = "";
$image_error = "";
$email_error = "";
$contact_error = "";
$address_error = "";

// check which of the buttons has been clicked
if (isset($_POST['login'])){
	validLogin();
} else if (isset($_POST['register'])){
	validRegister();
}





	//gets users IP address
function getIP(){
  $ip = $_SERVER['REMOTE_ADDR'];

  if (!empty ($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty ($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  return $ip;
}

/**
**Function to check if the user entered valid values during registration
*/
function validRegister(){
	// validation code for registration here
	$fullname = $_POST['fullname'];

	$passwd = $_POST['password'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$contact= $_POST['contact'];
	$image= $_POST['image'];
	$everythingOkay = true;

	// check if the username is not empty and it does not contain symbols or numbers
	if(empty($fullname) || preg_match('/[!@#$&%]|[0-9]/', $fullname)){
		$everythingOkay = false;
		global $fullname_error;
		$fullname_error = "Fullname cannot be empty or have symbols and numbers.";
	}

	// check if the password and it matches the regex below
	if(empty($passwd) || !preg_match('/^(?=.*[A-Z].{1,})(?=.*[!@#$&%~?*])(?=.*[0-9])(?=.*[a-z]).{6,}$/', $passwd)){
		global $pasword_error;
		$pasword_error = "Password must contain at least a symbol, upper case letter and at least 6 characters";
		$everythingOkay = false;
	}

	// check if the country is not empty and it does not contain symbols or numbers
	if(empty($country) || preg_match('/[!@#$&%]|[0-9]/', $country)){
		global $country_error;
		$country_error = "Country cannot be empty or have symbols and numbers.";
		$everythingOkay = false;
	}

	// check if the city is not empty and it does not contain symbols or numbers
	if(empty($city) || preg_match('/[!@#$&%]|[0-9]/', $city)){
		global $city_error;
		$city_error = "City cannot be empty or have symbols and numbers";
		$everythingOkay = false;
	}

	// check if the email is not empty and it is in the right format
	if(empty($email) || !preg_match('/^.+@.+\..+$/', $email)){
		global $email_error;
		$email_error = "Email not in the correct format";
		$everythingOkay = false;
	}

	// check if contact is not empty and contains just numbers
	if(empty($contact) || !preg_match('/^\d{10}$/', $contact)){
		global $contact_error;
		$contact_error = "Contact cannot be empty and should contains only 10 digits";
		$everythingOkay = false;
	}

	// check if address is empty
	if(empty($address)){
		global $address_error;
		$address_error = "Please enter address";
		$everythingOkay = false;
	}

	// check if a valid major is selected
	if(empty($image)){
		global $image_error;
		$image_error = "Please select profile picture";
		$everythingOkay = false;
	}

	// if everything is ok, check if the username is taken
	if ($everythingOkay){
		checkUsername();
	}

}

/**
**Function to check if the email is alredy in existence
*/
function checkUsername(){
	$email = $_POST['email'];
	$regUser = new DatabaseConnection;

	// database query to check if the email is taken
	$check_user = "SELECT * FROM customer WHERE customer_email='$email'";
	$username_check_query = $regUser->query($check_user);


	// check  the number of rows, if the rows are more than zero then it means that the email has been taken
	if (mysqli_num_rows($regUser->fetchResultObject())){
		global $user_name_error;
		$user_name_error = "Email already exists";
	} else {
		registerNewUser();
	}

}


/*
Function to register a new user
*/
function registerNewUser(){

	// save the user's details
	$fullname = $_POST['fullname'];
	$cust_ip = getIP();
	$passwd = $_POST['password'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$image = $_POST['image'];
	$contact= $_POST['contact'];

	$regUser = new DatabaseConnection;
	$hashed_password = password_hash($passwd, PASSWORD_DEFAULT);

	// query to insert the user into the database
	$insert_query = "INSERT INTO customer(customer_ip, customer_name, customer_email, customer_pass,
		customer_country, customer_city, customer_contact, customer_image, customer_address)
		 VALUES('$cust_ip', '$fullname',  '$email', '$hashed_password', '$country', '$city', '$contact', '$image', '$address');";
		 // var_dump($insert_query);

	$user_insert_query = $regUser->query($insert_query);
	// var_dump($regUser->db_result);
	if ($user_insert_query){
		// redirect the user to the login page once he or she has been registered
		header("Location:login.php");
	} else {
		echo "Insert failed";
	}
}

/**
**Function to make sure that the user provides valid details on login
*/
function validLogin(){

	// take the user's deatils
	if (isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
		$passwd = $_POST['password'];
	}
	// check if the user details are not empty
	if (empty($email)){
		global $user_name_error;
		$user_name_error = "Please provide a email";
	}
	if (empty($passwd)){
		global $pasword_error;
		$pasword_error = "Please provide a password";
	} else {
		verifyLogin();
	}
}


/**
**Function to log a user into the system
*/
function verifyLogin(){


	// take the user's email and password
	$email = $_POST['email'];
	$passwd = $_POST['password'];
	$loginUser = new DatabaseConnection;
	$select_query = "SELECT * FROM customer WHERE customer_email = '$email'";
	$login_query = $loginUser->query($select_query);
	var_dump($login_query);
	if ($login_query){
		while ($row = $loginUser->fetch()) {
			if (password_verify($passwd, $row['customer_pass'])){
				// start a session for the user
				session_start();
				$_SESSION['customer_id'] = $row['customer_id'];
				$_SESSION['customer_email'] = $row['customer_email'];
				$_SESSION['customer_name'] = $row['customer_name'];
				$_SESSION['customer_address'] = $row['customer_address'];
				$_SESSION['customer_contact'] = $row['customer_contact'];


				header('Location:../cart.php');
				echo "Login successful";
			}else {
				echo "Login failed";
			}
		}
	}
}



?>
