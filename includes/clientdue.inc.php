<?php

if(isset($_POST["submit"])){
    $due_date = $_POST["due_date"];
    $due_amount = $_POST["due_amount"];
    $client_id = $_POST["client_id"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyClientDue($due_date,$due_amount,$client_id) !== false){
        header("location: ../clientdue.php?error=emptyinput");
        exit();
    }
    
    createClientDue($conn, $due_date,$due_amount,$client_id);
    

}
else{
    header("location: ../clientdue.php");
    exit();
}