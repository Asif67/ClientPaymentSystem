<?php
function populateClientName($conn)
{

    $sql = "SELECT id,client_name FROM client_info;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    $stmt->bind_result($id, $client_name);
    $stmt->execute();
    $stmt->store_result();

    $blds = array();
    while ($stmt->fetch()) {
        $blds[] = array(
            "id"  => $id,
            "client_name" => $client_name
        );
    }
    return $blds;
}
function emptyClientInfo($name, $mobile_number, $address)
{
    $result;
    if (empty($name) || empty($mobile_number) || empty($address)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyClientPayment($payment_date, $payment_amount, $client_id)
{
    $result;
    if (empty($payment_date) || empty($payment_amount) || empty($client_id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyClientDue($due_date, $due_amount, $client_id)
{
    $result;
    if (empty($due_date) || empty($due_amount) || empty($client_id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createClientInfo($conn, $name, $mobile_number, $address)
{
    $sql = "INSERT INTO client_info (client_name,client_address,client_mobile_number) VALUES (?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../clientinfo.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $name, $mobile_number, $address);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($resultData);
    header("location: ../clientinfo.php?error=none");
    exit();
}

function createClientPayment($conn, $payment_date, $payment_amount, $client_id)
{
    $sql = "INSERT INTO client_payment (payment_date,payment_amount,client_id) VALUES (?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../clientpayment.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $payment_date, $payment_amount, $client_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($resultData);
    header("location: ../clientpayment.php?error=none");
    exit();
}

function createClientDue($conn, $due_date, $due_amount, $client_id)
{
    $sql = "INSERT INTO client_due (due_date,due_amount,client_id) VALUES (?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../clientdue.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $due_date, $due_amount, $client_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($resultData);
    header("location: ../clientdue.php?error=none");
    exit();
}
