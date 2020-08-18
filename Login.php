<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
if(isset($_POST['Login_btn'])){
    $regno = mysqli_real_escape_string($connection,$_POST['regno']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE regno='$regno' AND password='$password';";
    
    $result = mysqli_query($connection,$sql);

    if($result){
    if(mysqli_num_rows($result) == 1){
      $_SESSION['message'] = "You are now logged in";
      $information = mysqli_fetch_all($result,MYSQLI_ASSOC);
      $_SESSION['username'] = $information[0]['firstname'];
      $_SESSION['id'] = $regno;
      header("location: Menu.php");
    }
    else{
      $_SESSION['message'] = "Regno/password combination incorrect ";
    }
  }else{
    die(mysql.error());
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
<body class="black white-text">
    <div class="container">
    <h3 class="center">Login to an existing account</h3>
    <div class="center">
        <form class="col l6 s12" action = "Login.php" method = "post">
          <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Registration number" name="regno" type="number" class="textInput">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Password" name="password" type="password" class="textInput">
            </div>
          </div>
          <input type="submit" name="Login_btn" value = "Login" class="btn-large">
        </form>
      </div>
    </div>
</body>
<?php require_once('php/footer.php')?>