<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
if(isset($_GET['deleteid'])){
    $delid = $_GET['deleteid'];
    $sql = "DELETE FROM items WHERE itemid = $delid;";
    $result = mysqli_query($connection,$sql);
}
if(isset($_POST['new_button'])){
    $new_name = $_POST['name'];
    $new_price = $_POST['price'];
    $new_des = $_POST['des'];
    $hotelid = $_SESSION['hotelid'];
    $sql = "INSERT INTO items(name,description,hotelid,price,rating,count) VALUES ('$new_name','$new_des','$hotelid','$new_price',0,0);";
    $result = mysqli_query($connection,$sql);
}
if(isset($_POST['des_button'])){
    $new_des = $_POST['des'];
    $hotelid = $_SESSION['hotelid'];
    $sql = "UPDATE hotels SET description = '$new_des' WHERE hotelid = '$hotelid'";
    $result = mysqli_query($connection,$sql); 
}
if(isset($_POST['name_btn'])){
    $new_name = $_POST['name'];
    $hotelid = $_SESSION['hotelid'];
    $sql = "UPDATE hotels SET hotelname = '$new_name' WHERE hotelid = '$hotelid'";
    $result = mysqli_query($connection,$sql); 
}
$hotelid = $_SESSION['hotelid'];
$sql = "SELECT * from hotels WHERE hotelid = $hotelid;";
$result = mysqli_query($connection,$sql);
$items = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
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
<body class = "black white-text">
    <div class ="container">
        <div class = "row">
            <div class = "col s12 m6 l6">
                <?php
                $sql = "SELECT * from items WHERE hotelid = $hotelid;";
                $result = mysqli_query($connection,$sql);   
                $items_temp = mysqli_fetch_all($result,MYSQLI_ASSOC);
                mysqli_free_result($result);
                ?>
                <ul class="collection with-header black">
                <li class="collection-header black"><h4 class ="center">Available items</h4></li>
                <?php  foreach($items_temp as $item) {?> 
                    <li class="collection-item avatar black">
                    <h5>Name: <?php echo htmlspecialchars($item['name']) ?></h5>
                    <h5>Price: <?php echo htmlspecialchars($item['price']) ?></h5>
                    <h5>Description: <?php echo htmlspecialchars($item['description']) ?></h5>
                    <h5>User Rating: <?php echo htmlspecialchars($item['rating']) ?></h5>
                    <a href="hoteldashboard.php?deleteid=<?php echo $item['itemid'] ?>" class = "btn-flat red black-text">Remove</a>
                    <a href="edititem.php?id=<?php echo $item['itemid'] ?>" class = "btn-flat blue black-text">Edit</a>
                    </li>
                <?php }?>  
                </ul>
              
            </div>
            <div class = "col s12 m6 l6">
                <h4 class ="center">Hotel Profile</h4>
                <h5>Name: <?php echo htmlspecialchars($items[0]['hotelname']) ?></h5>
                <h5>Description: </h5>
                <p><?php echo htmlspecialchars($items[0]['description']) ?></p>
                <a href="#n" class = "btn-flat yellow black-text modal-trigger">Edit name</a>
                <a href="#d" class = "btn-flat blue black-text modal-trigger">Edit Description</a>
                <a href="#i" class = "btn-flat green black-text modal-trigger">Add new item</a>
            </div>
        </div>
    </div>
</body>

<div class = "modal white-text grey darken-4 " id = "n">
        <form action="hoteldashboard.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new name here" name="name" type="text" class="textInput">
            </div>
          </div>
          <input type="submit" name="name_btn" value = "Change" class="btn-large">
        </form>
</div>
<div class = "modal white-text grey darken-4 " id = "d">
        <form action="hoteldashboard.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new description here" name="des" type="text" class="textInput">
            </div>
          </div>
          <input type="submit" name="des_button" value = "Change" class="btn-large">
        </form>
</div>
<div class = "modal white-text grey darken-4 " id = "i">
        <form action="hoteldashboard.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter name here" name="name" type="text" class="textInput">
            </div>
            <div class="input-field col s12">
              <input placeholder = "Enter price here" name="price" type="number" class="textInput">
            </div>
            <div class="input-field col s12">
              <input placeholder = "Enter description here" name="des" type="text" class="textInput">
            </div>
          </div>
          <input type="submit" name="new_button" value = "Add" class="btn-large">
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
</script>
<?php require_once('php/footer.php')?>