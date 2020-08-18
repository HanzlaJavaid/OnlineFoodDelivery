<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
if(isset($_GET['deleteid'])){
    $staffid = $_GET['deleteid'];
    $sql = "DELETE FROM delivery_staff WHERE delivery_staff.staffid = $staffid;";
    $result = mysqli_query($connection,$sql);
    $items = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);    
}
if(isset($_POST['add_btn'])){
    $name_new = $_POST['name'];
    $num = $_POST['num'];
    $hotelid = $_SESSION['hotelid'];
    $sql = "INSERT INTO delivery_staff(hotelid, name ,contact) VALUES ('$hotelid','$name_new','$num');";
    $result = mysqli_query($connection,$sql);
}
$hotelid = $_SESSION['hotelid'];
$sql = "SELECT * from delivery_staff WHERE delivery_staff.hotelid = $hotelid;";
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
<body class="white-text black">
    <div class = "container">
    <br>
    <div class = "center">
    <a href="#add" class = "btn-flat blue black-text modal-trigger">Add new staff</a>
    </div>
        <ul class="collection with-header black">
            <li class="collection-header black"><h4>Delivery staff of your hotel</h4></li>
            <?php  foreach($items as $item) {?>
                <li class="collection-item avatar black">
                <h5><?php echo htmlspecialchars($item['name']) ?></h5>
                <p><b>Contact: </b><?php echo htmlspecialchars($item['contact']) ?></p>
                <a href="deliverystaff.php?deleteid=<?php echo $item['staffid'] ?>" class = "btn-flat red black-text">Remove</a>
                </li>    
            <?php }?>              
        </ul>
        </div>    
</body>
<div class = "modal white-text grey darken-4 " id = "add">
        <form action="deliverystaff.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter name here" name="name" type="text" class="textInput">
            </div>
            <div class="input-field col s12">
              <input placeholder = "Enter contact number here" name="num" type="number" class="textInput">
            </div>
          </div>
          <input type="submit" name="add_btn" value = "Add" class="btn-large">
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