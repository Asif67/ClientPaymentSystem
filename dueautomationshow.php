<?php
include 'includes/dbh.inc.php';


$sql = "SELECT client_name, payment_date, payment_amount, is_due from client_payment_check , client_info WHERE client_payment_check.client_id = client_info.id;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
$stmt->bind_result($payment_date, $payment_amount, $client_name,$is_due);
$stmt->execute();
$stmt->store_result();

$blds = array();
while ($stmt->fetch()) {
    $blds[] = array(
        "payment_date" => $payment_date,
        "payment_amount" => $payment_amount,
        "client_name" => $client_name,
        "is_due" => $is_due
    );
}
?>
<div class="table-responsive-md">
    <table class="table table-bordered">     
        <thead>
            <tr>
                <th scope="col">Client Full Name</th>
                <th scope="col">Payment Date</th>
                <th scope="col">Payment Amount</th>
                <th scope="col">Status</th>                
            </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($blds); $i++) : ?>
            <tr>
                <td><?= $blds[$i]["payment_date"] ?></td>
                <td><?= $blds[$i]["payment_amount"] ?></td>
                <td><?= $blds[$i]["client_name"] ?></td>
                <td><?= $blds[$i]["is_due"] == 1 ? "Due" : "Not Due" ?></td>                
            </tr>
        <?php endfor; ?>
        </tbody>        
    </table>
</div>