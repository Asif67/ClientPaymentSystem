<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $mobile_number = $_POST["mobile_number"];
    $address = $_POST["address"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyClientInfo($name,$mobile_number,$address) !== false){
        header("location: ../clientinfo.php?error=emptyinput");
        exit();
    }
    
    createClientInfo($conn, $name, $mobile_number, $address);
    

}
else{
    header("location: ../clientinfo.php");
    exit();
}