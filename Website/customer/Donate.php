<?php
//header for all pages
//always put   </body> </html> at the end of a file
include('../header.html');
//connection to DB
include('../connection.php');

//always use '' for echo's, keep things consistent
echo '

<div class="container" style="padding-top:20px;">
    <div class="row" style="padding-bottom:20px;">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Make A Donation</h1>
        </div>
        <div class="col-2"></div>
    </div>

<!-- beginning of form-->   
    <form  action="" method="post">
    <!--beginning of input-->
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
    
            <div class="form-group">
                <label for="donation_org">
                    <h3>Organization:</h3>
                </label>
                <select class = "form-control" name = "donation_org">
                ';

foreach ($dbh ->query('SELECT organization_id,organization_name FROM organization') as $row) {
    echo "<option value='" . $row["organization_id"] . "'>" . $row["organization_name"] . "</option>";
};

echo '
                </select>
            </div>
    
        </div>
        <div class="col-2"></div>
    </div>
    
    
    <!--end of input-->
        <!-- beginning of input-->

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <div class="form-group">
                    <label for="donation_fname">
                        <h3>First Name:</h3>
                    </label>
                    <input type="text" class="form-control" name="donation_fname">
                </div>

            </div>
            <div class="col-2"></div>
        </div>

<!--end of input-->
<!--beginning of input-->
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

        <div class="form-group">
            <label for="donation_lname">
                <h3>Last Name:</h3>
            </label>
            <input type="text" class="form-control" name="donation_lname">
        </div>

    </div>
    <div class="col-2"></div>
</div>

<!--end of input-->
<!--beginning of input-->
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

        <div class="form-group">
            <label for="donation_amount">
                <h3>Donation Amount:</h3>
            </label>
            <input type="number" class="form-control" name="donation_amount">
        </div>

    </div>
    <div class="col-2"></div>
</div>

<!--end of input-->

<!--beginning of input-->
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

    </div>
    <div class="col-2"></div>
</div>


<!--end of input-->
</form>
<!-- end of form-->  
';
if (isset($_POST["submit"])) {
   /*ID iterator begin */
   $counter = 0;
   foreach ($dbh ->query('SELECT MAX(donator_id) AS "length" FROM donation') as $row) {
 
    $counter =  $row["length"];
   }
   $iterator_id =  $counter + 1;
   /*ID iterator end */
    $date = date("Y/m/d");
    $dbh ->query("INSERT INTO donation (donator_id, organization_id, donation_date, donation_amount, donation_fname, donation_lname) VALUES ('" . $iterator_id . "','" . $_POST['donation_org'] . "','" . $date . "','" . $_POST['donation_amount'] . "','" . $_POST['donation_fname'] . "','" . $_POST['donation_lname'] . "')");
    $dbh = null;
    
}

?>

</body>

</html>