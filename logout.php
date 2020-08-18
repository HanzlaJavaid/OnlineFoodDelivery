<?php require_once('php/db_connection.php')?>
<?php require_once('php/header.php')?>
<?php require_once('php/functions.php')?>
<?php
session_destroy();
unset($_SESSION['message']);
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['firstname']);
unset($_SESSION['mode']);
header("location: index.php");
?>
<?php require_once('php/footer.php')?>