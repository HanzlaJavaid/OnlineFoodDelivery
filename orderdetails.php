<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
if(isset($_GET['orderid'])){
    $id = mysqli_real_escape_string($connection,$_GET['orderid']);
    if(isset($_POST['delivered'])){
        $sql = "UPDATE orders SET status = 1 WHERE orderid = $id";
        $result = mysqli_query($connection,$sql);
    }
    else if(isset($_POST['canceled'])){
        $sql = "UPDATE orders SET status = 2 WHERE orderid = $id";
        $result = mysqli_query($connection,$sql);
    }
    else if(isset($_POST['undileverd'])){
        $sql = "UPDATE orders SET status = 0 WHERE orderid = $id";
        $result = mysqli_query($connection,$sql);
    }
    $sql = "SELECT * FROM orders where orderid = $id";
    $result = mysqli_query($connection,$sql);
    $items = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    $userregno = $items[0]['customer_regno'];
    $sql = "SELECT * FROM users INNER JOIN location ON users.regno = location.regno WHERE users.regno = $userregno;";
    $result = mysqli_query($connection,$sql);
    $user_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
}

?>
<body class= "black white-text">
    <div class="container">
        <h3 class="center">
            DETAILS OF ORDER
        </h3>
        <h4>ORDER RECOMENDATION : <?php echo htmlspecialchars($items[0]['Description'])?></h4>
        <h4>ORDER TYPE : <?php $ordertype = htmlspecialchars($items[0]['type']);
        if($ordertype == 0){
            echo "SIMPLE ORDER";
        }
        if($ordertype == 1){
            echo "PRE ORDER";
        }
        ?></h4>
        <h4>ORDER TIME : <?php echo htmlspecialchars($items[0]['orderdate'])?></h4>
<?php if($ordertype == 1 ) {?><h4>EXPECTED DELIVERY TIME : <?php echo htmlspecialchars($items[0]['preorderdate'])?><?php }?></h4>
        <h4>STATUS : <?php 
        $st = htmlspecialchars($items[0]['status']);
        if($st == 0){
            echo "UNDELIVERED";
        }
        if($st == 1){
            echo "DELIVERED";
        }
        if($st == 2){
            echo "CANCELED";
        }
        ?></h4>
        <h4>NAME OF CUSTOMER : <?php echo htmlspecialchars($user_details[0]['firstname'])?></h4>
        <h4>LOCATION OF DELIVERY : <?php echo htmlspecialchars($user_details[0]['hostel'])?></h4>
        <h4>CONTACT OF CUSTOMER : <?php echo htmlspecialchars($user_details[0]['phoneno'])?> </h4>
        <form action="orderdetails.php?orderid=<?php echo $id ?>" method="post">
        <input type = "submit" name = "delivered" class="btn green" value ="MARK DELIVERED"></input>
        <input type = "submit" name = "undileverd" class="btn yellow" value = "MARK UNDELIVERED"></input>
        <input type = "submit" name = "canceled" class="btn red" value = "MARK CANCELED"></input> 
        </form>
    </div>
</body>
<?php require_once('php/footer.php')?>