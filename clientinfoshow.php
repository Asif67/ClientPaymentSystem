<?php
include 'includes/dbh.inc.php';


$sql = "SELECT client_name, client_mobile_number, client_address FROM client_info;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
$stmt->bind_result($client_name, $client_mobile_number, $client_address);
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
<div class="table-responsive-md">
    <table class="table table-bordered">     
        <thead>
            <tr>
                <th scope="col">Client Full Name</th>
                <th scope="col">Client Mobile Number</th>
                <th scope="col">Client Address</th>                
            </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($blds); $i++) : ?>
            <tr>
                <td><?= $blds[$i]["client_name"] ?></td>
                <td><?= $blds[$i]["client_address"] ?></td>
                <td><?= $blds[$i]["client_mobile_number"] ?></td>                                
            </tr>
        <?php endfor; ?>
        </tbody>        
    </table>
</div>
