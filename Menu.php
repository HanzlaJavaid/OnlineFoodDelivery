<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
$regno = $_SESSION['id'];
$sql = 'SELECT * FROM hotels';
$result = mysqli_query($connection,$sql);
$items = mysqli_fetch_all($result,MYSQLI_ASSOC);
$sql = "SELECT * FROM users WHERE regno = $regno";
$result = mysqli_query($connection,$sql);
$userinfo = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
$isPresident =$userinfo[0]['isPresident'];
$_SESSION['isPresident'] = $isPresident;
?>

<body class="white-text black">

    <div class="container">
        <h3>Greetings , <?php echo htmlspecialchars( $_SESSION['username']) ?> <br> From where would you like to serve your appetite ?</h3>

        <div class="row ">
            <?php foreach($items as $item){?>
            <div class="col s12 l4 m6">
                <div class="card grey darken-4"> 
                    <div class="card-title"><h4 class="center"><?php echo htmlspecialchars($item['hotelname']) ?></h4></div>
                    <div class="card-content">
                        <?php echo htmlspecialchars($item['description']) ?>
                    </div>
                    <div class="card-action">
                        <a href="items.php?hotelid=<?php echo $item['hotelid'] ?>" class = "btn-flat blue black-text">Menu</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        </div>
    </div>
</body>
<?php require_once('php/footer.php')?>