<?php
include 'includes/dbh.inc.php';
include 'header.php';
?>
<section>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Client Due Form</h2>
                    <form action="includes/login.inc.php" method="post">
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" name="name" placeholder="Payment Amount">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="date" name="mobile_number" placeholder="Payment Date">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" name="address" placeholder="Client ID">
                                </div>
                            </div>                            
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
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