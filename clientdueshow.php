<?php
include 'includes/dbh.inc.php';
include 'header.php';
?>
<?php
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
?>

<select>
    <?php for ($i = 0; $i < count($blds); $i++) : ?>
        <option value="<?= $blds[$i]["id"] ?>"><?= $blds[$i]["client_name"] ?></option>
    <?php endfor; ?>
</select>