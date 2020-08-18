<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
if(isset($_GET['hotelid'])){
    $hotelid = mysqli_real_escape_string($connection,$_GET['hotelid']);
    $userid = $_SESSION['id'];
    $sql = "SELECT * FROM items WHERE hotelid = $hotelid";
    $result = mysqli_query($connection,$sql);
    $items = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    $sql = "SELECT * FROM location WHERE regno = $userid;";
    $result = mysqli_query($connection,$sql);
    $details = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    $sql ="SELECT * FROM hotels WHERE hotelid = $hotelid;";
    $result = mysqli_query($connection,$sql);
    $hoteldetails = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
}
?>
<style>
input[type=text] {
  color: white;
}
input[type=number] {
  color: white;
}
input[type=email] {
  color: white;
}
input[type=password] {
  color: white;
}

</style>
<body class= "black white-text">
    <div class="container">
        <h3 class="center">
            All available items at <?php echo htmlspecialchars($hoteldetails[0]['hotelname']); ?>
        </h3>
        <div class = "row">
            <?php foreach($items as $item){?>
                <div class = "col s12 md6 l6">
                    <div class = "card z-depth-0 grey darken-4">
                        <div class="card-title"><h3 class = "center"><?php echo htmlspecialchars($item['name'])?></h3></div>
                            <div class = "card-content">
                                <h5>Description: <?php echo htmlspecialchars($item['description']) ?></h5>
                                
                                <br>
                                <h5>Unit Price: <?php echo htmlspecialchars($item['price']) ?></h5>
                                
                                <br>
                                <h5>Customer Rating: <?php echo htmlspecialchars($item['rating']) ?></h5>
                                
                            </div>
                         <div class = "card-action">
                         <a href="orderpage.php?hotelid=<?php echo $item['hotelid']?>&itemid=<?php echo $item['itemid']?>" class = "btn-flat blue black-text">Order</a>
                         <?php if($_SESSION['isPresident'] == 1) {?>
                            <a href="preorder.php?hotelid=<?php echo $item['hotelid']?>&itemid=<?php echo $item['itemid']?>" class = "btn-flat blue black-text">Pre Order</a>
                         <?php }?>
                         <a href="rate.php?itemid=<?php echo $item['itemid']?>" class = "btn-flat blue black-text">Give Rating</a>
                         </div>   
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</body>

<!-- jQuery and Materialize JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
<?php require_once('php/footer.php')?>