<?php
session_start();

include_once("insertclass.php");
include_once("controller/searchcontroller.php");

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
  }
  $price += $values_price;
}
?>

<!DOCTYPE html>

<html>

<head>
  <title>Page Title</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  <center style="margin-top: 2%">
    <h1>Payment</h1>
  </center>
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <div class="container" style="margin-top: -2%">
      <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
          <div class="row">
            <div class="receipt-header">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="receipt-left">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                <div class="receipt-right">
                  <h5>H-Oils</h5>
                  <p>+233 265 222 333 <i class="fa fa-phone"></i></p>
                  <p>hoilsghan@gmail.com<i class="fa fa-envelope-o"></i></p>
                  <p>Ghana <i class="fa fa-location-arrow"></i></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <h5>
                    <?php
                    if(isset($_SESSION['customer_id'])){
                      echo $_SESSION['customer_name'];
                    }
                    ?>
                    </h5>
                  <p><b>Mobile :</b>
                    <?php
                    if(isset($_SESSION['customer_id'])){
                      echo $_SESSION['customer_contact'];
                    }
                    ?>
                  </p>
                  <p><b>Email :</b>
                    <?php
                    if(isset($_SESSION['customer_id'])){
                      echo $_SESSION['customer_email'];
                    }
                    ?>
                  </p>
                  <p><b>Address :</b>
                    <?php
                    if(isset($_SESSION['customer_id'])){
                      echo $_SESSION['customer_address'];
                    }
                    ?>
                     </p>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="receipt-left">
                  <h1>Receipt</h1>
                </div>
              </div>
            </div>
          </div>

          <div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>

                  <?php
                  foreach ($cartitems as $key){
                    foreach ($key as $row){
          						$name = $row['product_title'];
          						$total_price=$row['total_price'];
                    echo "
                    <tr>
                    <td class='col-md-9'>$name</td>
                    <td class='col-md-3'><i class='fa fa-inr'></i>$ $total_price</td>
                    </tr>
                    ";
                  }
                  }
                  ?>
                  <td class="text-right">
                    <p>
                      <strong>Number of Items: </strong>
                    </p>
                    <p>
                      <strong>Total Amount: </strong>
                    </p>
                  </td>
                  <td>
                    <p>
                      <strong><i class="fa fa-inr"></i> <?php totalItems();?></strong>
                    </p>
                    <p>
                      <strong><i class="fa fa-inr"></i>$ <?php totalPrice();?></strong>
                    </p>
                  </td>
                </tr>
                <tr>

                  <td class="text-right"><h2><strong>Total: </strong></h2></td>
                  <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i>$ <?php totalPrice(); ?></strong></h2></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid receipt-footer">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <p><b>Date :</b> <?php echo  date("Y/m/d");?></p>
                  <p><b>Time :</b> <?php date_default_timezone_set("Africa/Accra");
                  echo date("h:i:sa");?></p>
                  <h5 style="color: rgb(140, 140, 140);">Thank you for shopping with us!</h5>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="hoilsghana@gmail.com">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_qty" value=<?php totalItems();?>>
    <input type="hidden" name="amount" value=<?php totalPrice();?>>
    <input type="hidden" name="currency_code" value="USD">

    <!-- Display the payment button. -->
    <center>
    <input id="sbmtBtn" type="image" name="submit" border="0"
    src="./images/buynow.png"
    alt="Buy Now">
    <img alt="" border="0" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
  </center>
  </form>
</body>
</html>
