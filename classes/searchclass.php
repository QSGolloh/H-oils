
<?php
/**
 *@author Selassie Golloh
 *@version 1.0 
 **/

//include the database class
require_once("./database/dbconnectclass.php");

class search extends DatabaseConnection
{

/**
* method to load all search results matching keyword
*/
function searchkeywords($keyword){
  $sql_query = "SELECT * FROM products";
  $search_query = $this->query($sql_query);
  if ($search_query){
    while ($row = $this->fetch()) {
      $keywords = $row['product_keywords'];
      $keywords = explode(",", $keywords);
      foreach ($keywords as $value) {
            if(strpos(trim($value), trim($keyword)) !== false){
              $image = $row['product_image'];
              $price = $row['product_price'];
              $name = $row['product_title'];
              $desc = $row['product_desc'];

              echo   '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
        <a href="product-detail.php?img='.$image.'&price='.$price.'&name='.$name.'&desc='.$desc.'" >
              <div class="block2">
                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                  <img src="'.$image.'" alt="IMG-PRODUCT" height="400px"></a>

                  <div class="block2-overlay trans-0-4">
                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                      <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                      <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                    </a>

                    <div class="block2-btn-addcart w-size1 trans-0-4">
                      <!-- Button -->
                      <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                        Add to Cart
                      </button>
                    </div>
                  </div>
                </div>

                <div class="block2-txt p-t-20">
                  <a href="product-detail.php?img='.$image.'&price='.$price.'&name='.$name.'&desc='.$desc.'"" class="block2-name dis-block s-text3 p-b-5">
                    '.$name.'
                  </a> 

                  <span class="block2-price m-text6 p-r-5">
                    $'.$price.'
                  </span>
                </div>
              </div>
            </div>';


            } else {
              continue;
            }
      }
         

    }
  }
}
}




