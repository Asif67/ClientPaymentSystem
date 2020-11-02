<?php
include 'includes/dbh.inc.php';
include 'header.php';
?>
<?php
$sql = "SELECT client_name, payment_date, payment_amount FROM client_info INNER JOIN client_payment;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
$stmt->bind_result($payment_date, $payment_amount, $client_name);
$stmt->execute();
$stmt->store_result();

$blds = array();
while ($stmt->fetch()) {
    $blds[] = array(
        "payment_date" => $payment_date,
        "payment_amount" => $payment_amount,
        "client_name" => $client_name
    );
}
?>
<table>
    <th>
    <td>payment_date</td>
    <td>payment_amount</td>
    <td>client_name</td>
    </th>
    <?php for ($i = 0; $i < count($blds); $i++) : ?>
        <tr>
            <td><?= $blds[$i]["payment_date"] ?></td>
            <td><?= $blds[$i]["payment_amount"] ?></td>
            <td><?= $blds[$i]["client_name"] ?></td>
        </tr>
    <?php endfor; ?>
</table>
