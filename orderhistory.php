<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
$hotelid = $_SESSION['hotelid'];
$sql = "SELECT * from orders WHERE orders.hotelid = $hotelid ORDER BY orders.orderid DESC;";
$result = mysqli_query($connection,$sql);
$items = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
?>

<body class="white-text black">
<div class = "container">
        <ul class="collection with-header black">
            <li class="collection-header black"><h4>Orders History</h4></li>
            <?php  foreach($items as $item) {?>
                <?php
                    $itemid = $item['itemid'];
                    $sql = "SELECT items.name FROM items WHERE itemid = $itemid;";
                    $result_temp = mysqli_query($connection,$sql);
                    $items_temp = mysqli_fetch_all($result_temp,MYSQLI_ASSOC);
                    mysqli_free_result($result_temp);?>
                <li class="collection-item avatar black">
                <h5><?php echo htmlspecialchars($items_temp[0]['name']) ?></h5>
                <p><b>Quantity: </b><?php echo htmlspecialchars($item['quantity']) ?>     &nbsp  <b>Price: </b> <?php echo htmlspecialchars($item['price']) ?></p>
                <p><b>Order date: </b><?php echo htmlspecialchars($item['orderdate']) ?>   &nbsp  <b>Customer RegNo: </b><?php echo htmlspecialchars($item['customer_regno']) ?></p>
                <p><b>Status: </b> <?php 
                $st = htmlspecialchars($item['status']);
                if($st == 0){
                    echo "UNDELIVERED";
                }
                if($st == 1){
                    echo "DELIVERED";
                }
                if($st == 2){
                    echo "CANCELED";
                }
                ?></p>
                <a href="orderdetails.php?orderid=<?php echo $item['orderid'] ?>" class = "btn-flat blue black-text">More Details</a>
                </li>
               
            <?php }?>              
        </ul>
</div>
</body>
<?php require_once('php/footer.php')?>