<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
$id;
$quantity= 1;
$details ="";
$location =""; 
$des = "";
$devdate = date("Y-m-d H:i:s");
if(isset($_GET['hotelid']) && $_GET['itemid']){
    $id = mysqli_real_escape_string($connection,$_GET['itemid']);
    $sql = "SELECT * FROM items WHERE itemid = $id";
    $result = mysqli_query($connection,$sql);
    $details = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $userid = $_SESSION['id'];
    $sql = "SELECT hostel FROM location WHERE regno = $userid;";
    $result = mysqli_query($connection,$sql);
    $hostel = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $location = $hostel[0]['hostel'];
    mysqli_free_result($result);
    $quantity = 1;
    $des = "";
    $_SESSION['hotelid'] = $_GET['hotelid'];
}
if(isset($_POST['Change_btn'])){
    $quantity = $_POST['quantity'];
    $location = $_POST['loc'];
    $des = $_POST['rec'];
    $devdate = $_POST['dt'];
    $sql = "UPDATE location SET hostel = '$location' WHERE regno = $userid;";
    $result = mysqli_query($connection,$sql);
}
$_SESSION['itemid'] = $id;
$_SESSION['type'] = 0;
$_SESSION['rec'] = $des;
$_SESSION['quantity'] = $quantity;
$_SESSION['price'] = $details[0]['price'] * $quantity;
$_SESSION['date'] = $devdate;
$price = $_SESSION['price']
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
<body class="white-text black">
    <?php if($_SESSION['isPresident'] = 1){ ?>
    <div class="container">
        <h3 class="center">    
            CONFIRM ORDER
        </h3>
        <h4>ITEM NAME: <?php echo htmlspecialchars($details[0]['name'])?> </h4>
        <h4>DESCRIPTION: <?php echo htmlspecialchars($details[0]['description'])?> </h4>
        <h4>PRICE: <?php echo htmlspecialchars($price)?> </h4>
        <h4>QUANTITY: <?php echo $quantity?> </h4>
        <h4>DELIVERY LOCATION: <?php echo $location ?> </h4>
        <h4>DELIVERY DATE: <?php echo $devdate ?> </h4>
        <a href="#change_q" class ="btn green modal-trigger">Customize Order</a>
        <br>
        <div class = "center">
            <form action="placeorder.php?preorder=1" method="post">
                <input type="submit" name="place_btn" value ="Place Order" class = "btn-large">
            </form>
        </div>
    </div>
    <?php } ?>
</body>

<div class = "modal white-text grey darken-4 " id = "change_q">
        <form action="preorder.php?hotelid=<?php echo $_SESSION['hotelid']?>&itemid=<?php echo $id?>" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter Quantity" name="quantity" type="number" class="textInput">
            </div>
            <div class="input-field col s12">
              <input placeholder = "Enter Location" name="loc" type="text" class="textInput">
            </div>
            <div class="input-field col s12">
              <input placeholder = "Enter Recomendations" name="rec" type="text" class="textInput">
            </div>
            <div class="input-field col s12 white-text">
                <input type="datetime" class="datepicker black-text" name="dt">
            </div>
          </div>
          <input type="submit" name="Change_btn" value = "Change" class="btn-large">
        </form>

</div>
<script
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
    $(document).ready(function(){
    $('.datepicker').datepicker();
  });
</script>
<?php require_once('php/footer.php')?>