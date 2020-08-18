<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
$hotelid = $_SESSION['hotelid'];
$sql = "SELECT * from orders WHERE orders.hotelid = $hotelid AND orders.status = 0 AND orders.type = 1;";
$result = mysqli_query($connection,$sql);
$items = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
?>

<body class="white-text black">
<div class="container">
        <h3>Greetings , <?php echo htmlspecialchars( $_SESSION['firstname']) ?> <br> Following are the active Pre orders placed at your Hotel </h3>

        <div class="row white-text">
        <?php  foreach($items as $item) {?> 
            <div class="col s12 l4 m6">
                <div class="card grey darken-4"> 
                <?php
                    $itemid = $item['itemid'];
                    $sql = "SELECT items.name FROM items WHERE itemid = $itemid;";
                    $result_temp = mysqli_query($connection,$sql);
                    $items_temp = mysqli_fetch_all($result_temp,MYSQLI_ASSOC);
                    mysqli_free_result($result_temp);?>
                    <div class="card-title"><h4 class="center"><?php echo htmlspecialchars($items_temp[0]['name']) ?></h4></div>
                    <div class="card-content">
                        <h4>Price: <?php echo htmlspecialchars($item['price']) ?></h4>
                        <h4>Quantity: <?php echo htmlspecialchars($item['quantity']) ?></h4>
                        <h4>Due Date: <?php echo htmlspecialchars($item['preorderdate']) ?></h4>
                    </div>
                    <div class="card-action">
                        <a href="orderdetails.php?orderid=<?php echo $item['orderid'] ?>" class = "btn-flat blue black-text">Details</a>
                    </div>
                </div>
            </div>
        <?php }?>  
        </div>
        </div>
    </div>
</body>
<?php require_once('php/footer.php')?>