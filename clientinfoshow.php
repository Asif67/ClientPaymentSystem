<?php
include 'includes/dbh.inc.php';
include 'header.php';

$sql = "SELECT client_name, client_mobile_number, client_address FROM client_info;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
$stmt->bind_result($client_mobile_number, $client_address, $client_name);
$stmt->execute();
$stmt->store_result();

$blds = array();
while ($stmt->fetch()) {
    $blds[] = array(
        "client_mobile_number" => $client_mobile_number,
        "client_address" => $client_address,
        "client_name" => $client_name
    );
}
?>
<table>
    <th>
    <td>client_mobile_number</td>
    <td>client_address</td>
    <td>client_name</td>
    </th>
    <?php for ($i = 0; $i < count($blds); $i++) : ?>
        <tr>
            <td><?= $blds[$i]["client_mobile_number"] ?></td>
            <td><?= $blds[$i]["client_address"] ?></td>
            <td><?= $blds[$i]["client_name"] ?></td>
        </tr>
    <?php endfor; ?>
</table>
