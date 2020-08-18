<?php 
session_start();
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

<nav class="nav-wrapper indigo">
        <div class="container">
            <a href="#" class="brand-logo left">GIKI ONLINE FOOD</a>
            <a href="#" class="sidenav-trigger right" data-target = "mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <?php if(isset($_SESSION['mode'])) {?>
                <?php if($_SESSION['mode'] == 'USER' and !isset($_SESSION['id'])) : ?>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Register.php">Register</a></li>
                <?php endif; ?>
                <?php if($_SESSION['mode'] == 'ADMIN' and !isset($_SESSION['id'])) : ?>
                <li><a href="Loginadmin.php">Admin Login</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['id']) and $_SESSION['mode'] == 'USER') : ?>
                <li><a href="customerorderhistory.php">Order History</a></li>
                <li><a href="userprofile.php">User Profile</a></li>
                <li><a href="Menu.php">Menu</a></li>
                <li><a href="logout.php" class ="btn red">Logout</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['id']) and $_SESSION['mode'] == 'ADMIN') : ?>
                <li><a href="orderhistory.php">Order History</a></li>
                <li><a href="preorders.php">Pre Orders</a></li>
                <li><a href="currentorders.php">Current Orders</a></li>
                <li><a href="deliverystaff.php">Delivery Staff</a></li>
                <li><a href="hoteldashboard.php">Hotel Dashboard</a></li>
                <li><a href="logout.php" class ="btn red">Logout</a></li>
                <?php endif; ?>
                <?php }?>
            </ul>
        </div>
</nav>
<ul class="sidenav" id = "mobile-links">
<?php if(isset($_SESSION['mode'])) {?>
                <?php if($_SESSION['mode'] == 'USER' and !isset($_SESSION['id'])) : ?>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Register.php">Register</a></li>
                <?php endif; ?>
                <?php if($_SESSION['mode'] == 'ADMIN' and !isset($_SESSION['id'])) : ?>
                <li><a href="Loginadmin.php">Admin Login</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['id']) and $_SESSION['mode'] == 'USER') : ?>
                <li><a href="customerorderhistory.php">Order History</a></li>
                <li><a href="userprofile.php">User Profile</a></li>
                <li><a href="Menu.php">Menu</a></li>
                <li><a href="logout.php" class ="btn red">Logout</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['id']) and $_SESSION['mode'] == 'ADMIN') : ?>
                <li><a href="orderhistory.php">Order History</a></li>
                <li><a href="preorders.php">Pre Orders</a></li>
                <li><a href="currentorders.php">Current Orders</a></li>
                <li><a href="deliverystaff.php">Delivery Staff</a></li>
                <li><a href="hoteldashboard.php">Hotel Dashboard</a></li>
                <li><a href="logout.php" class ="btn red">Logout</a></li>
                <?php endif; ?>
                <?php }?>
</ul>