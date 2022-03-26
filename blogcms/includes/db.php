<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cms";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn) {
        //echo "We are connected";
    }

?>