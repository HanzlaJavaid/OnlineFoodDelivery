<?php
///Closing database connection
if(isset($connection)){
mysqli_close($connection);}
?>

<script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        })
    </script>

</html>