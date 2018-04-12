<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
<?php
require_once("insertclass.php"); 
require_once("controller/searchcontroller.php");
?>

<!-- Header -->
<header class="header1">
<!-- Header desktop -->
<div class="container-menu-header">
	<div class="topbar">
		<div class="topbar-social">
			<a href="#" class="topbar-social-item fa fa-facebook"></a>
			<a href="#" class="topbar-social-item fa fa-instagram"></a>
			<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
			<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
			<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
		</div>

		<span class="topbar-child1">
			Free shipping for standard order over $100
		</span>

		<div class="topbar-child2">
			<span class="topbar-email">
				fashe@example.com
			</span>

			<div class="topbar-language rs1-select2">
				<select class="selection-1" name="time">
					<option>USD</option>
					<option>EUR</option>
				</select>
			</div>
		</div>
	</div>

	<div class="wrap_header">
		<!-- Logo -->
		<a href="home.php" class="logo">
			<img src="images/icons/logo.jpg" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<ul class="main_menu">
							<li>
								<a href="home.php">Home</a>
								
							</li>

							
							<li>
								<a href="cart.php">Cart</a>
							</li>

							

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<p>Welcome <? if (isset($_SESSION['customer_name'])) { echo $_SESSION['customer_name'];} 
				else { echo "Guest"; } ?> </p>
				<!-- 	<a href="#" class="header-wrapicon1 dis-block"> -->
			<ul class="main_menu">
				<li>
					<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						<ul class="sub_menu">
							<li><?php if (isset($_SESSION['customer_id'])) { echo "<a href='logout.php'>Logout</a>";}
								else { echo "<a href='signing/login.php'>Login</a>";} ?> </li>
						</ul>
				</li>
			</ul>

			<!-- </a> -->
			<span class="linedivide1"></span>
			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti"><?php totalItems(); ?></span>
				<!-- Header cart noti -->
			</div>
		</div>
	</div>
</div>
<!-- Header Mobile -->
<div class="wrap_header_mobile">
	<!-- Logo moblie -->
	<a href="home.html" class="logo-mobile">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
	</a>

<!-- Button show menu -->
<div class="btn-show-menu">
<!-- Header Icon mobile -->
<div class="header-icons-mobile">
<a href="#" class="header-wrapicon1 dis-block">
		<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
	</a>

	<span class="linedivide2"></span>

	<div class="header-wrapicon2">
		<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span class="header-icons-noti">0</span>

		<!-- Header cart noti -->
		<div class="header-cart header-dropdown">
			<ul class="header-cart-wrapitem">


				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="images/item-cart-01.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							White Shirt With Pleat Detail Back
						</a>

						<span class="header-cart-item-info">
							1 x $19.00
						</span>
					</div>
				</li>

				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="images/item-cart-02.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							Converse All Star Hi Black Canvas
						</a>

						<span class="header-cart-item-info">
							1 x $39.00
						</span>
					</div>
				</li>

				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="images/item-cart-03.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							Nixon Porter Leather Watch In Tan
						</a>

						<span class="header-cart-item-info">
							1 x $17.00
						</span>
					</div>
				</li>
			</ul>

			<div class="header-cart-total">
				Total: $75.00
			</div>

			<div class="header-cart-buttons">
				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						View Cart
					</a>
				</div>

				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
	<span class="hamburger-box">
		<span class="hamburger-inner"></span>
	</span>
</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
<ul class="main-menu">
	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<span class="topbar-child1">
			Free shipping for standard order over $100
		</span>
	</li>

	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<div class="topbar-child2-mobile">
			<span class="topbar-email">
				fashe@example.com
			</span>

			<div class="topbar-language rs1-select2">
				<select class="selection-1" name="time">
					<option>USD</option>
					<option>EUR</option>
				</select>
			</div>
		</div>
	</li>

	<li class="item-topbar-mobile p-l-10">
		<div class="topbar-social-mobile">
			<a href="#" class="topbar-social-item fa fa-facebook"></a>
			<a href="#" class="topbar-social-item fa fa-instagram"></a>
			<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
			<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
			<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
		</div>
	</li>

	<li class="item-menu-mobile">
		<a href="home.html">Home</a>
		<ul class="main_menu">
			<li>
				<a href="home.php">index</a>
				
			</li>

			<li>
				<a href="blog.html">Blog</a>
			</li>

			<li>
				<a href="about.html">About</a>
			</li>

			<li>
				<a href="contact.html">Contact</a>
			</li>
		</ul>
	</nav>
</div>
</header>

				<!-- Title Page -->
<!-- <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/bac.png);">
<h2 class="l-text2 t-center">
Cart
</h2>
</section> -->

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
	<!-- Cart item -->

	<div class="container-table-cart" >
		<!-- Cart item -->
		<form action= "" method = "post" enctype= "multipart/form-data">

			<table class="table-shopping-cart">
				<tr class="table-head">
					<th class="column-1"></th>
					<th class="column-2">Product</th>
					<th class="column-3">Price</th>
					<th class="column-7">Quantity</th>
					<th class="column-4 p-l-70">Change quantity</th>
					<th class="column-5">Total</th>
					<th class="column-6">Remove</th>
					<th class="column-6">Update</th>
				</tr>






				<?php 
				$cartitems = loadcart(); 
				$price =0;
				foreach ($cartitems as $key) {
					$values_price = 0;
      // $qty = $key["qty"];
					foreach ($key as $row) {
						$values_price = $row['product_price'];
						$pro_id = $row['product_id'];
						$image = $row['product_image'];
						$name = $row['product_title'];
						$quantity = $row['qty'];
						$total_price=$row['total_price']; 
						//$total=+$total_price;



						echo "
						<tr class=\"table-row\"  >
							<td class=\"column-1\">
								<div>
									<img src=$image alt=\"IMG-PRODUCT\" width= \"110\">
								</div>
							</td>
							<td class=\"column-2\">$name</td>
							<td class=\"column-3\">$values_price</td>
							<td class=\"column-7\">$quantity</td>
							<form method=\"POST\">
							<td class=\"column-4\">
								<div>
									<input type=\"hidden\" size=\"10\" value=".$pro_id." name=\"qty_id\">
									<input style =\"background-color:  #3CBC8D;\"type=\"number\" name=\"quantity\">
								</div>
							</td>
							<td class=\"column-5\">$total_price</td>
								<td class=\"column-6\"><button type=\"submit\" name= \"remove\">Remove</button></td>
								<td class=\"column-6\"><button type=\"submit\" name= \"update\">Update</button></td>

							</form>
						</tr>
						";    
					}  $price += $values_price; 
				} 

				?>
			</table>


			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10" >
					<!-- Button -->
					<button type ="submit" name= "shopping" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Continue Shopping
					</button>
				</div>

	<!-- 	<div class="size10 trans-0-4 m-t-10 m-b-10">
	Button -->
			<!-- <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
				Update Cart
			</button> -->
			<!-- </div>  -->
		</div>

		<!-- Total -->
		<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
			<h5 class="m-text20 p-b-24">
				Cart Totals
			</h5>

			<!--  -->
			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Subtotal: 
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					$<?php  totalPrice();?>
				</span>
			</div>

			<!--  -->
			<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
				<span class="s-text18 w-size19 w-full-sm">
					Shipping:
				</span>

				<div class="w-size20 w-full-sm">
					<p class="s-text8 p-b-23">
						There are no shipping methods available. Please double check your address, or contact us if you need any help.
					</p>

					<span class="s-text19">
						Calculate Shipping
					</span>

					<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
						<select class="selection-2" name="country">
							<option>Select a country...</option>
							<option>US</option>
							<option>UK</option>
							<option>Japan</option>
						</select>
					</div>

					<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
					</div>

					<div class="size13 bo4 m-b-22">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
					</div>

					<div class="size14 trans-0-4 m-b-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Update Totals
						</button>
					</div>
				</div>
			</div>

			<!--  -->
			<div class="flex-w flex-sb-m p-t-26 p-b-30">
				<span class="m-text22 w-size19 w-full-sm">
					Total:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					$<?php  totalPrice();?>
				</span>
			</div>

			<div class="size15 trans-0-4">
				<!-- Button -->
				<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type= "submit" name="checkout">
					Proceed to Checkout
				</button>
			</div>
		</div>
	</div>
</section>




	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, PMB CT3 Cantonments, Berekuso, Eastern Region , or call us on +233 560 223 056
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							All
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Cococnut
						</a>
					</li>

					
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="about.php" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="contact.php" class="s-text7">
							Contact Us
						</a>
					</li>

					
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
