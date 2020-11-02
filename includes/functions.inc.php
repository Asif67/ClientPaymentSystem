<?php

function emptyInputSignUp($name, $email, $username, $pwd, $pwdRepeat)
{
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
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
function emptyClientPayment($payment_date,$payment_amount,$client_id)
{
    $result;
    if (empty($payment_date) || empty($payment_amount) || empty($client_id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function emptyClientDue($due_date,$due_amount,$client_id)
{
    $result;
    if (empty($due_date) || empty($due_amount) || empty($client_id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE usersUid=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
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
function createClientPayment($conn, $payment_date,$payment_amount,$client_id)
{
    $sql = "INSERT INTO client_payment (payment_date,payment_amount,client_id) VALUES (?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../clientpayment.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sss", $payment_date,$payment_amount,$client_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($resultData);
    header("location: ../clientpayment.php?error=none");
    exit();
}
function createClientDue($conn, $due_date,$due_amount,$client_id)
{
    $sql = "INSERT INTO client_due (due_date,due_amount,client_id) VALUES (?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../clientdue.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sss", $due_date,$due_amount,$client_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($resultData);
    header("location: ../clientdue.php?error=none");
    exit();
}
function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}

