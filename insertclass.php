
<?php
/**
 *@author Selassie Golloh
 *@version 1.0 
 **/

//include the database class
require_once("database/dbconnectclass.php");

if (isset($_POST['update'])) {
  update_cart($_POST['qty_id'], $_REQUEST['quantity']);
  error_reporting(E_ERROR | E_PARSE);
  header('location: cart.php');
}

if (isset($_POST['remove']))
{
  removecart($_POST['qty_id']);
  error_reporting(E_ERROR | E_PARSE);
  header('location: cart.php');
}

/**
* method to load all categories
*/
function loadAllCategories(){
  $loadcat = new DatabaseConnection;
  $sql_query = "SELECT * FROM categories";
  $cat_query = $loadcat->query($sql_query);
  if ($cat_query){
    while ($row = $loadcat->fetch()) {
      echo '<option value ='.$row['cat_id'].'>'.$row['cat_name'].'</option>'.'<br>';
    }
  }
}


/**
* method to load all brands
*/
function loadAllBrands(){
  $loadbrand = new DatabaseConnection;
  $sql_query = "SELECT * FROM brands";
  $brand_query = $loadbrand->query($sql_query);
  if ($brand_query){
    while ($row = $loadbrand->fetch()) {
      echo '<option value ='.$row['brand_id'].'>'.$row['brand_name'].'</option>'.'<br>';
    }
  }
}


/**
* method to load all product details
*/
function loadAllproducts(){
  $loadproduct = new DatabaseConnection;
  $sql_query = "SELECT * FROM products order by RAND()";
  $product_query = $loadproduct->query($sql_query);
  if ($product_query){
    while ($row = $loadproduct->fetch()) {
      $pro_id = $row['product_id'];
      $image = $row['product_image'];
      $price = $row['product_price'];
      $name = $row['product_title'];
      $desc = $row['product_desc'];
      echo   '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50"><form method="POST">
      <a href="product-detail.php?img='.$image.'&price='.$price.'&name='.$name.'&desc='.$desc.'" >
      <div class="block2">
      <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
      <img src="'.$image.'" alt="IMG-PRODUCT" height="400px">

      <div class="block2-overlay trans-0-4">
      <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
      <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
      <i class="icon-wishlist icon_heart dis-home" aria-hidden="true"></i>
      </a>

      <div class="block2-btn-addcart w-size1 trans-0-4">
      <!-- Button -->
      <input type="hidden" value='.$pro_id.' name="mycartitem">
      <button type="submit" name="addtocart" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
      Add to Cart
      </button>
      </div>
      </div>
      </div></a>

      <div class="block2-txt p-t-20">
      <a href="product-detail.php?img='.$image.'&price='.$price.'&name='.$name.'&desc='.$desc.'"" class="block2-name dis-block s-text3 p-b-5">
      '.$name.'
      </a> 

      <span class="block2-price m-text6 p-r-5">
      $'.$price.'
      </span>
      </div>
      </div></form>
      </div>';
    }
  }
}



if(isset($_POST['addtocart']))
{
  $id=$_POST['mycartitem'];

  cart($id);
}

function cart($id)
{
 $loadcart = new DatabaseConnection;
 $ip = getIP();
 $sql = "SELECT p_id, ip_add, qty FROM cart WHERE ip_add = '$ip' AND p_id = '$id'";

 $query = $loadcart->query($sql);
 $row=$loadcart->fetch();

 if ($row!=null)
 {
   echo "
   <script type=\"text/javascript\">
   window.alert(\"Already in cart\");
   </script>";
 }
 else{
   $insert ="insert into cart (p_id, ip_add, qty) VALUES ('$id', '$ip', 1)";
   $insert_query = $loadcart->query($insert);
   echo "<script>window.open('home.php','_self')</script>";
 }
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

//get number of items
function totalItems(){
  if (isset($_GET['addtocart'])){
    $loaditems = new DatabaseConnection;
    $ip = getIP();
    $getItems = "select * from cart where ip_add ='$ip'";
    $query_items = $loaditems->query($getItems);
    $query_results = $loaditems->fetchResultObject();
    $countItems = mysqli_num_rows($query_results);
  }
  else{
    $loaditem = new DatabaseConnection;
    $ip = getIP();
    $getItem = "select * from cart where ip_add ='$ip'";
    $query_item = $loaditem->query($getItem);
    $countItems = mysqli_num_rows($loaditem->fetchResultObject());
  }
  echo $countItems;
}

//get total price of items added to cart
function totalPrice(){
  $total_price = 0;
  $loadprice = new DatabaseConnection;
  $loadprice1 = new DatabaseConnection;
  $ip = getIP();
  $getPrice = "select * from cart where ip_add ='$ip'";
  $query_price = $loadprice ->query($getPrice);
  // $item_price = $loadprice->fetch();

  $products =  $loadprice->fetchResultObject();
  foreach ($products as $product) {
    $pro_id = $product['p_id'];
    $p = "SELECT  (cart.qty *products.product_price) total_price FROM products,cart WHERE products.product_id=cart.p_id ";
    $pp = $loadprice1->query($p);
    $values = $loadprice1->fetchResultObject();
    $values_sum = 0;
    foreach ($values as $value) {
      $values_sum += $value['total_price'];
    }
    //$total_price += $values_sum;
  }
  echo $values_sum;
}


// function totalprice(){
//   $total_price = 0;
//   $loadprice = new DatabaseConnection;
//   $loadprice1 = new DatabaseConnection;
//   $ip = getIP();
//   $getPrice = "select * from cart where ip_add ='$ip'";
//   $query_price = $loadprice ->query($getPrice);
//   // $item_price = $loadprice->fetch();

//   $products =  $loadprice->fetchResultObject();
//   $values = array();
//   $sql="SELECT  (cart.qty *products.product_price) total_price FROM products,cart WHERE products.product_id=cart.p_id ";
//   foreach ($products as $product) {
//     $pro_id = $product['p_id'];
//     // $p = "select * from products where product_id = '$pro_id'";
    
//     $pp = $loadprice1->query($sql);
    
//   }
//   array_push($values, $loadprice1->fetchResultObject());
//   return $values;

// }


function loadcart(){
  $total_price = 0;
  $loadprice = new DatabaseConnection;
  $loadprice1 = new DatabaseConnection;
  $ip = getIP();
  $getPrice = "select * from cart where ip_add ='$ip'";
  $query_price = $loadprice ->query($getPrice);
  // $item_price = $loadprice->fetch();

  $products =  $loadprice->fetchResultObject();
  $values = array();
  $sql="SELECT product_id, product_image, product_title, qty, product_price, (cart.qty *products.product_price) total_price FROM products,cart WHERE products.product_id=cart.p_id ";
  foreach ($products as $product) {
    $pro_id = $product['p_id'];
    // $p = "select * from products where product_id = '$pro_id'";
    
    $pp = $loadprice1->query($sql);
    
  }
  array_push($values, $loadprice1->fetchResultObject());
  return $values;
  //var_dump($values);
}

function update_cart($id, $qty)
{
  $add=new DatabaseConnection();
  $ip_add = getIP();
  $sql2= "UPDATE cart set qty= '$qty' WHERE p_id = '$id' AND ip_add ='$ip_add'";
  $result=$add->query($sql2);

  echo "Updated successfully";
  error_reporting(E_ERROR | E_PARSE);
  header('location: cart.php'); 
}


if (isset($_POST['remove'])){
  $id=$_POST['cart_id'];
  echo "in remove";
  removecart($id); 
}

function removecart($id){
  $removecart = new DatabaseConnection;
  $ip = getIP();

  $delete_product = "delete from cart where p_id = '$id' AND ip_add= '$ip'";
  $delete = $removecart->query($delete_product);
  if ($delete){
    echo "<script>window.open('cart.php','_self')</script>";
  }
}


  // if checkout button is clicked
if (isset($_POST['checkout'])){
  checkout();
}

function checkout(){
  if(isset($_SESSION['customer_id'])){
    header('Location:checkout.php');
  } else {
    header('Location:signing/login.php');
  }  

}

  // if continue shopping button is clicked
if (isset($_POST['shopping'])){
  header('Location:home.php');
}



  // if update button is clicked
if (isset($_POST['update'])){
  $id= $_POST['qty_id'];
  update($id);
}

function update($id){
 $updatecart = new DatabaseConnection;
 $ip = getIP();
 $qty= $_POST['quantity'];

 $query= "UPDATE cart
 SET qty = '$qty'
 WHERE p_id = '$id' AND ip_add= '$ip'";

 $update = $updatecart->query($query);
 if ($update){
  echo "  <script type=\"text/javascript\">
  window.alert(\"Successfully updated\");
  </script>";
}else{
  echo "Unsuccessful update";
}

}






