<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
    
    $itemid = $_SESSION['itemid'];
    $price = $_SESSION['price'];
    $status = 0;
    $type = 0;
    $recomedation = $_SESSION['rec'];
    $regno = $_SESSION['id'];
    $quantity = $_SESSION['quantity'];
    $hotelid = $_SESSION['hotelid'];
    $devdate = 0;
    $message = "";
    if(isset($_GET['preorder'])){
          $type = 1;
          $devdate = $_SESSION['date'];
    }
    $sql = "INSERT INTO orders(itemid,price,status,type,Description,orderdate,preorderdate,customer_regno,quantity,hotelid)VALUES('$itemid','$price','$status','$type','$recomedation',NOW(),'$devdate','$regno','$quantity','$hotelid');";
    if (mysqli_query($connection, $sql)) {
        $message  = "Order placed successfully";
      } else {
        $message = "Something went wrong";
      } 
?>
<body class= "black white-text">
      <div class = "container">
        <h4 class = "center"><?php echo $message ?></h4>
      </div>
</body>
<?php require_once('php/footer.php')?>