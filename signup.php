<?php
include 'includes/dbh.inc.php';
include 'header.php';
?>
<section>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Sign Up Form</h2>
                    <form action="includes/signup.inc.php" method="post">
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" name="name" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" name="uid" placeholder="User Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" name="pwd" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" name="pwdrepeat" placeholder="Repeat Password">
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
        } else if ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
        } else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        } else if ($_GET["error"] == "passworddontmatch") {
            echo "<p>Password Does not match!</p>";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something Went Wrong. Try again!</p>";
        } else if ($_GET["error"] == "usernametaken") {
            echo "<p>Username taken!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>Signed Up Successfully!</p>";
        }
    }
    ?>
</section>

<?php
include 'footer.php';
?>