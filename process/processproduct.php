<?php

//include the database class
require_once("../database/dbconnectclass.php");


if (isset($_POST['submit'])) 
{
	$product = $_POST['product'];
	$cat = $_POST['category'];
	$brand = $_POST['brand'];
	$price = $_POST['price'];
	$desc = $_POST['description'];
	$image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
     $image_name = addslashes($_FILES['images']['name']);
     $image_size = getimagesize($_FILES['images']['tmp_name']);
     move_uploaded_file($_FILES["images"]["tmp_name"], "../images/" . $_FILES["images"]["name"]);
     $image = "images/" . $_FILES["images"]["name"];
	$key = $_POST['keywords'];
	

	$loadcat = new DatabaseConnection;
	$sql_query = "INSERT INTO products (product_cat, product_brand, product_title, product_price, 
		product_desc, product_image, product_keywords) VALUES ('$cat', '$brand', '$product','$price', '$desc', '$image', '$key')";
	$process_query = $loadcat->query($sql_query);
	if($process_query){
		echo "Product input successful ";
	}else{
		echo "error occured";
	}

}



?> 
