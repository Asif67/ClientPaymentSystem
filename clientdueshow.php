<?php
include 'includes/dbh.inc.php';
include 'header.php';

$sql = "SELECT client_name, due_date, due_amount FROM client_info INNER JOIN client_due;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
$stmt->bind_result($payment_date, $payment_amount, $client_name);
$stmt->execute();
$stmt->store_result();

$blds = array();
while ($stmt->fetch()) {
    $blds[] = array(
        "due_date" => $due_date,
        "due_amount" => $due_amount,
        "client_name" => $client_name
    );
}
?>
<table>
    <th>
    <td>due_date</td>
    <td>due_amount</td>
    <td>client_name</td>
    </th>
    <?php for ($i = 0; $i < count($blds); $i++) : ?>
        <tr>
            <td><?= $blds[$i]["due_date"] ?></td>
            <td><?= $blds[$i]["due_amount"] ?></td>
            <td><?= $blds[$i]["client_name"] ?></td>
        </tr>
    <?php endfor; ?>
</table>
