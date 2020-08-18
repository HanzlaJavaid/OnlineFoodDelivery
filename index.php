<?php 
session_start();
if(isset($_POST['admin'])){
    $_SESSION['mode'] = "ADMIN";
    header("location: Loginadmin.php");
}
if(isset($_POST['user'])){
    $_SESSION['mode'] = "USER";
    header("location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <!-- Compiled and minified JavaScript -->
    
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>GIKI ONLINE FOOD SYSTEM</title>
</head>
<body class="white-text black">
    <div class="container">
        <h1 class="center">SELECT AN INTERFACE</h1>
        <div class="row black-text">
            <div class="col s12 l6">
                <div class="card green lighten-1">
                    <div class="card-title">
                        <h3 class="center">ADMIN</h3>
                    </div>
                    <div class="card-content">
                        Admins from registerd hotels can access their interface here.
                    </div>
                    <div class="card-action center">
                    <form action="index.php" method="post">
                        <input type = "submit" name = "admin" class = "btn-large center" value = "JUMP IN"></input>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col s12 l6">
                <div class="card orange lighten-1">
                    <div class="card-title">
                        <h3 class="center">CUSTOMER</h3>
                    </div>
                    <div class="card-content">
                        Every customer within the vicinity of GIKI can access their interface here.      
                    </div>
                    <div class="card-action center">
                    <form action="index.php" method="post">
                        <input type = "submit" name = "user" class = "btn-large center" value = "JUMP IN"></input>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        })
    </script>

</html>