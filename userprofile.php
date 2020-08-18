<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
$userid = $_SESSION['id'];
if(isset($_POST['ph'])){
    $new_phoneno = $_POST['num'];
    $sql = "UPDATE users SET phoneno = $new_phoneno  WHERE regno = $userid;";
    $result = mysqli_query($connection,$sql);
}
if(isset($_POST['em'])){
    $new_email = $_POST['email'];
    $sql = "UPDATE users SET email = '$new_email' WHERE regno = $userid;";
    $result = mysqli_query($connection,$sql);
}
if(isset($_POST['lo'])){
  $new_hostel = $_POST['hostel'];
  $sql = "UPDATE location SET hostel = '$new_hostel' WHERE regno = $userid;";
  $result = mysqli_query($connection,$sql);
}
if(isset($_POST['so'])){
  $new_society = $_POST['soc'];
  $sql = "UPDATE users SET society = '$new_society' WHERE regno = $userid;";
  $result = mysqli_query($connection,$sql);
}
$sql = "SELECT * FROM users WHERE regno = $userid;";
$result = mysqli_query($connection,$sql);
$items = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
$sql = "SELECT * FROM location WHERE regno = $userid;";
$result = mysqli_query($connection,$sql);
$details = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
<body class= "black white-text">
    <div class="container">
        <h3 class ="center">User Profile</h3>
        <?php if($_SESSION['isPresident'] == 1){?>
        <h3 class ="center">President Account</h3>
        <?php } ?>
        <h4>Reg No: <?php echo htmlspecialchars($items[0]['regno'])?></h4>
        <h4>First Name: <?php echo htmlspecialchars($items[0]['firstname'])?></h4>
        <h4>Last Name: <?php echo htmlspecialchars($items[0]['lastname'])?></h4>
        <h4>Default Location: <?php echo htmlspecialchars($details[0]['hostel'])?></h4>  
        <h4>Phone number: <?php echo htmlspecialchars($items[0]['phoneno'])?></h4> 
        <h4>Email: <?php echo htmlspecialchars($items[0]['email'])?></h4>
        <h4>Society: <?php echo htmlspecialchars($items[0]['society'])?></h4>  
        <a href="#ph" class = "btn-flat blue black-text modal-trigger">Edit Phone Number</a>
        <a href="#email" class = "btn-flat blue black-text modal-trigger">Edit Email</a>
        <a href="#loc" class = "btn-flat blue black-text modal-trigger">Edit Default Location</a>
        <a href="#ss" class = "btn-flat blue black-text modal-trigger">Edit Society</a>
    </div>
</body>
<div class = "modal white-text grey darken-4 " id = "ph">
        <form action="userprofile.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new phone number here" name="num" type="number" class="textInput">
            </div>
          </div>
          <input type="submit" name="ph" value = "Change" class="btn-large">
        </form>
</div>
<div class = "modal white-text grey darken-4 " id = "email">
        <form action="userprofile.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new email here" name="email" type="email" class="textInput">
            </div>
          </div>
          <input type="submit" name="em" value = "Change" class="btn-large">
        </form>
</div>
<div class = "modal white-text grey darken-4 " id = "loc">
        <form action="userprofile.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new location here" name="hostel" type="text" class="textInput">
            </div>
          </div>
          <input type="submit" name="lo" value = "Change" class="btn-large">
        </form>
</div>
<div class = "modal white-text grey darken-4 " id = "ss">
        <form action="userprofile.php" method="post">
        <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Enter new location here" name="soc" type="text" class="textInput">
            </div>
          </div>
          <input type="submit" name="so" value = "Change" class="btn-large">
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