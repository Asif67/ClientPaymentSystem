<?php
include 'includes/dbh.inc.php';


$sql = "SELECT client_name, due_date, due_amount FROM client_info INNER JOIN client_due;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
$stmt->bind_result($client_name, $due_date, $due_amount);
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
<div class="table-responsive-md">
    <table class="table table-bordered">     
        <thead>
            <tr>
                <th scope="col">Client Full Name</th>
                <th scope="col">Due Date</th>
                <th scope="col">Due Amount</th>                
            </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($blds); $i++) : ?>
            <tr>
                <td><?= $blds[$i]["client_name"] ?></td>
                <td><?= $blds[$i]["due_date"] ?></td>
                <td><?= $blds[$i]["due_amount"] ?></td>                
            </tr>
        <?php endfor; ?>
        </tbody>        
    </table>
</div>