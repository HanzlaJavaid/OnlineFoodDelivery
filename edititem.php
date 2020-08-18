<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
$itemid = $_GET['id'];
if(isset($_POST['name_btn'])){
    $new_name = $_POST['name'];
    $sql = "UPDATE items SET name = '$new_name'  WHERE itemid = $itemid;";
    $result = mysqli_query($connection,$sql);
    
}
if(isset($_POST['des_button'])){
    $new_des = $_POST['des'];
    $sql = "UPDATE items SET description = '$new_des' WHERE itemid = $itemid;";
    $result = mysqli_query($connection,$sql);
}
if(isset($_POST['price_button'])){
    $new_price = $_POST['price'];
    $sql = "UPDATE items SET price = '$new_price' WHERE itemid = $itemid;";
    $result = mysqli_query($connection,$sql);
}
$sql = "SELECT * from items WHERE itemid = $itemid;";
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
<div class="container">
        <h3 class ="center">Item Details</h3>
        <h4>Name: <?php echo htmlspecialchars($items[0]['name'])?></h4>
        <h4>Unit Price: <?php echo htmlspecialchars($items[0]['price'])?></h4>
        <h4>Description: <?php echo htmlspecialchars($items[0]['description'])?></h4> 
        <a href="#n" class = "btn-flat yellow black-text modal-trigger">Edit Name</a>
        <a href="#d" class = "btn-flat blue black-text modal-trigger">Edit Description</a>
        <a href="#p" class = "btn-flat green black-text modal-trigger">Edit Price</a>
</div>
</body>
<div class = "modal white-text grey darken-4 " id = "n">
        <form action="edititem.php?id=<?php echo $items[0]['itemid'] ?>" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new name here" name="name" type="text" class="textInput">
            </div>
          </div>
          <input type="submit" name="name_btn" value = "Change" class="btn-large">
        </form>
</div>
<div class = "modal white-text grey darken-4 " id = "d">
        <form action="edititem.php?id=<?php echo $items[0]['itemid'] ?>" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new description here" name="des" type="text" class="textInput">
            </div>
          </div>
          <input type="submit" name="des_button" value = "Change" class="btn-large">
        </form>
</div>
<div class = "modal white-text grey darken-4 " id = "p">
        <form action="edititem.php?id=<?php echo $items[0]['itemid'] ?>" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new price here" name="price" type="number" class="textInput">
            </div>
          </div>
          <input type="submit" name="price_button" value = "Change" class="btn-large">
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