<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

  <?php
  //pop up to redirect user to index page
  echo '<script type="text/javascript">';
  echo 'alert("You have been Logged Out. You Will be Redirected to the Home Page");';
  echo 'window.location.href = "index.php";';
  echo '</script>';
  // remove all session variables
  session_unset();
  // destroy the session
  session_destroy();
  echo "All session variables are now removed, and the session is destroyed.";
  ?>

</body>
</html>
