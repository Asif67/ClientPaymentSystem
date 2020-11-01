<?php
    $serverName = "localhost";
    $dbUserName = "root";
    $dbpassword = "";
    $dbName = "thesis";

    $conn = mysqli_connect($serverName,$dbUserName,$dbpassword,$dbName);
    if(!$conn){
        die("Connection Failed: " .mysqli_connect_error());
    }
?>