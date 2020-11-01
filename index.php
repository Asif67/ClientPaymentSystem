<?php
include 'includes/dbh.inc.php';
include 'header.php';
?>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<h1 class="title">Logged In Sucessfully, ' .$_SESSION["useruid"]. ' </h1>';                    
                } else {
                    echo '<h1 class="title">Please Log In</h1>';                    
                }
                ?>                
                <!--
                <form method="POST" action="includes/connect.php">                    
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" placeholder="Disease Name" name="disease_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" placeholder="Disease Symptoms" name="disease_symptoms">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" placeholder="Disease Frequency" name="disease_frequency">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input class="input--style-4" type="text" placeholder="Disease Cure" name="disease_cure">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Image</label>
                                    <input type="file" name="image" id="">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>                        
                </form>
                -->
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>