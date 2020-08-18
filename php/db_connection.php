<?php
///Create a database connection
$dbhost = "sql202.epizy.com";
$dbuser = "epiz_26208664";
$dbpass = "BuO1v70ggNW";
$dbname = "epiz_26208664_projectdatabase";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
///Test if connection succeeded
if(mysqli_connect_errno()){
    die("Database connection failed : " . mysqli_connect_errno(). "(".mysqli_connect_errno().")");
}
?>