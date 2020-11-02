<?php

if(isset($_POST["submit"])){
    $payment_date = $_POST["payment_date"];
    $payment_amount = $_POST["payment_amount"];
    $client_id = $_POST["client_id"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyClientPayment($payment_date,$payment_amount,$client_id) !== false){
        header("location: ../clientpayment.php?error=emptyinput");
        exit();
    }
    
    createClientPayment($conn, $payment_date,$payment_amount,$client_id);
    

}
else{
    header("location: ../clientpayment.php");
    exit();
}