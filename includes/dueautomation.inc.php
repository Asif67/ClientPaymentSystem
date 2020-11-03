<?php

if(isset($_POST["submit"])){
    $payment_date = $_POST["payment_date"];
    $payment_amount = $_POST["payment_amount"];
    $client_id = $_POST["client_id"];
    date_default_timezone_set('Asia/Dhaka');
    $date = date('Y-m-d');
    if(strtotime($payment_date) < strtotime($date)){
        $is_due = 1;        
    }
    else
    {
        $is_due = 0;        
    }
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyClientPaymentCheck($payment_date,$payment_amount,$client_id,$is_due) !== false){
        header("location: ../dueautomation.inc.php?error=emptyinput");
        exit();
    }
    
    createClientPaymentCheck($conn, $payment_date,$payment_amount,$client_id,$is_due);
    

}
else{
    header("location: ../dueautomation.php");
    exit();
}