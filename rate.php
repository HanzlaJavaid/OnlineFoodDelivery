<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php 
if(isset($_GET['itemid'])){
    $errormessage = "";
    $itemid = $_GET['itemid'];
    $sql = "SELECT * FROM items WHERE itemid = $itemid";
    $result = mysqli_query($connection,$sql);
    $details = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $userid = $_SESSION['id'];
}
if(isset($_POST['r_btn'])){
    $new_rate = $_POST['r'];
    if($new_rate>= 0 & $new_rate <=10){
        $sql = "SELECT * FROM israted WHERE regno = $userid AND itemid = $itemid;";
        $result = mysqli_query($connection,$sql);
        $test = mysqli_fetch_all($result,MYSQLI_ASSOC);
        if($test == null){
        $sql = "SELECT * FROM items WHERE itemid = $itemid;";
        $result = mysqli_query($connection,$sql);
        $det = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $sql = "UPDATE items SET count=count+1 WHERE itemid = $itemid;";
        $result = mysqli_query($connection,$sql);
        $divider = $det[0]['count'];
        $sum = $det[0]['rating'] + $new_rate;
        if($divider == 0){
            $average = $sum;}
        else if($divider != 0){
            $average = $sum/2;
        }
        $sql = "UPDATE items SET rating = $average WHERE itemid = $itemid;";
        $result = mysqli_query($connection,$sql);
        $sql = "INSERT INTO israted VALUES('$userid','$itemid');";
        $result = mysqli_query($connection,$sql);
        header("location: Menu.php");
    }
    else {$errormessage ="You have already rated this item";}
    }
    else{
        $errormessage = "Invalid rating";
    }
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
<body class = "black white-text">
    <div class = "container">
        <h4 class="center">Rate <?php echo htmlspecialchars($details[0]['name']) ?></h4>
        <form action="rate.php?itemid=<?php echo $itemid ?>" method="post">
            <div class="row">
            <div class="input-field col s12 white-text">
              <input placeholder = "Enter Rating(0-10)" name="r" type="number" class="textInput">
            </div>
          </div>
          <div class = "center">
          <input type="submit" name="r_btn" value = "RATE" class="btn-large">
          </div>
        </form>
        <h6 class ="center"><?php echo $errormessage ?></h6>
    </div>
    
</body>
<?php require_once('php/footer.php')?>