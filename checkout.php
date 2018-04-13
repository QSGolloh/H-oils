<!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

  <h1>This is the checkout page</h1>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <div class="container">
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
                  <h5>H-Oils.</h5>
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
                  <h5>Gurdeep Singh <small>  |   Lucky Number : 156</small></h5>
                  <p><b>Mobile :</b> +91 12345-6789</p>
                  <p><b>Email :</b> info@gmail.com</p>
                  <p><b>Address :</b> Australia</p>
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
                <tr>
                  <td class="col-md-9">Payment for August 2016</td>
                  <td class="col-md-3"><i class="fa fa-inr"></i> 15,000/-</td>
                </tr>
                <tr>
                  <td class="col-md-9">Payment for June 2016</td>
                  <td class="col-md-3"><i class="fa fa-inr"></i> 6,00/-</td>
                </tr>
                <tr>
                  <td class="col-md-9">Payment for May 2016</td>
                  <td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
                </tr>
                <tr>
                  <td class="text-right">
                    <p>
                      <strong>Total Amount: </strong>
                    </p>
                    <p>
                      <strong>Late Fees: </strong>
                    </p>
                    <p>
                      <strong>Payable Amount: </strong>
                    </p>
                    <p>
                      <strong>Balance Due: </strong>
                    </p>
                  </td>
                  <td>
                    <p>
                      <strong><i class="fa fa-inr"></i> 65,500/-</strong>
                    </p>
                    <p>
                      <strong><i class="fa fa-inr"></i> 500/-</strong>
                    </p>
                    <p>
                      <strong><i class="fa fa-inr"></i> 1300/-</strong>
                    </p>
                    <p>
                      <strong><i class="fa fa-inr"></i> 9500/-</strong>
                    </p>
                  </td>
                </tr>
                <tr>

                  <td class="text-right"><h2><strong>Total: </strong></h2></td>
                  <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid receipt-footer">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <p><b>Date :</b> 15 Aug 2016</p>
                  <h5 style="color: rgb(140, 140, 140);">Thank you for your business!</h5>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="receipt-left">
                  <h1>Signature</h1>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="herschelgomez@xyzzyu.com">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="Hot Sauce-12oz. Bottle">
    <input type="hidden" name="amount" value="5.95">
    <input type="hidden" name="currency_code" value="USD">

    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0"
    src="./images/buynow.png"
    alt="Buy Now">
    <img alt="" border="0" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

  </form>


</body>
</html>
