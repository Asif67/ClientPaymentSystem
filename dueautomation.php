<?php
include 'includes/dbh.inc.php';
require 'includes/functions.inc.php';
include 'header.php';
$blds = array();
$blds = populateClientName($conn);
?>
<section>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper">
            <div class="card card-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <h2 class="title">Client Payment Form</h2>
                            <form action="includes/dueautomation.inc.php" method="post">
                                <div class="row row-space">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input class="input--style-4" type="text" name="payment_amount" placeholder="Payment Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input class="input--style-4" type="date" name="payment_date" placeholder="Payment Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select class="input--style-4" name="client_id">
                                                <?php for ($i = 0; $i < count($blds); $i++) : ?>
                                                    <option value="<?= $blds[$i]["id"] ?>"><?= $blds[$i]["client_name"] ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <?php
                            include_once 'dueautomationshow.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
    }
    ?>
</section>
<?php
include 'footer.php';
?>