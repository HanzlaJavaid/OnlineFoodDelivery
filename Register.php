<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
if(isset($_POST['register_btn'])){
    $firstname = mysqli_real_escape_string($connection,$_POST['fname']);
    $lastname = mysqli_real_escape_string($connection,$_POST['lname']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $regno = mysqli_real_escape_string($connection,$_POST['regno']);
    $society = mysqli_real_escape_string($connection,$_POST['society']);
    $loc = mysqli_real_escape_string($connection,$_POST['loc']);
    $phoneno = mysqli_real_escape_string($connection,$_POST['phoneno']);   
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $password2 = mysqli_real_escape_string($connection,$_POST['password2']);

    if($password == $password2 && $phoneno != null){
        
        //Register
        $password = md5($password);
        $sql = "INSERT INTO users(regno,firstname,lastname,password,phoneno,society) VALUES($regno,'$firstname','$lastname','$password',$phoneno,'$society');";
        $result = mysqli_query($connection,$sql);
        if($result){
          $sql = "INSERT INTO location VALUES('$regno','$loc');";
          $result2 = mysqli_query($connection,$sql);
          $_SESSION['message'] = "You are now logged in";
          $_SESSION['id'] = $regno;
          $_SESSION['username'] = $firstname;
          header("location: Menu.php");
        }else{
          die(mysql.error());
        }  
    }else{
        //fail
        $_SESSION['message'] = "Something went wrong.";
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
    <h3 class="center">Create a new account</h3>
    <div class="center">
        <form class="col l6 s12" action = "Register.php" method = "post">
          <div class="row">
          <div class="input-field col s6">
              <input placeholder="Registration number" name="regno" type="number" class="textInput">
            </div>
        </div>
           <div class="row"> 
            <div class="input-field col s6">
              <input placeholder="First name" name="fname" type="text" class="textInput">
            </div>
            <div class="input-field col s6">
              <input placeholder="Last name" name="lname" type="text" class="textInput">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Email" name="email" type="email" class="textInput">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder = "Phone number" name="phoneno" type="number" class="textInput">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input placeholder = "Society" name="society" type="text" class="textInput">
            </div>
            <div class="input-field col s6">
              <input placeholder = "Hostel" name="loc" type="text" class="textInput">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Password" name="password" type="password" class="textInput">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Confirm password" name="password2" type="password" class="textInput">
            </div>
          </div>
         <input type="submit" name="register_btn" value = "Register" class="btn-large">
        </form>
      </div>
    </div>
</body>
<?php require_once('php/footer.php')?>