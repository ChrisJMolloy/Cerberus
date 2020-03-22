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
            <h1>Add An Animal Shelter</h1>
        </div>
        <div class="col-2"></div>
    </div>
<!-- beginning of form-->   
    <form  action="" method="post">
        <!-- beginning of input-->

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <div class="form-group">
                    <label for="org_name">
                        <h3>Organization Name:</h3>
                    </label>
                    <input type="text" class="form-control" name="org_name">
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
            <label for="org_street">
                <h3>Street:</h3>
            </label>
            <input type="text" class="form-control" name="org_street">
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
            <label for="org_city">
                <h3>City:</h3>
            </label>
            <input type="text" class="form-control" name="org_city">
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
            <label for="org_province">
                <h3>Province:</h3>
            </label>
            <input type="text" class="form-control" name="org_province">
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
            <label for="org_postal">
                <h3>Postal Code:</h3>
            </label>
            <input type="text" class="form-control" name="org_postal">
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
            <label for="org_phone">
                <h3>Phone Number:</h3>
            </label>
            <input type="number" class="form-control" name="org_phone">
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
            <label for="org_web">
                <h3>Website:</h3>
            </label>
            <input type="text" class="form-control" name="org_web">
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
if(isset($_POST["submit"])){
   /*ID iterator begin */
   $counter = 0;
   foreach ($dbh ->query('SELECT MAX(organization_id) AS "length" FROM organization') as $row) {
 
    $counter =  $row["length"];
   }
   $iterator_id =  $counter + 1;
   /*ID iterator end */


    $dbh ->query("INSERT INTO organization (organization_id, organization_name, organization_street, organization_city, organization_province, organization_postal_code, organization_phone) VALUES ('".$iterator_id."','".$_POST['org_name']."','".$_POST['org_street']."','".$_POST['org_city']."','".$_POST['org_province']."','".$_POST['org_postal']."', '".$_POST['org_phone']."')");
    $dbh ->query("INSERT INTO shelter (organization_id, website) VALUES ('".$iterator_id."','".$_POST['org_web']."')");
    $dbh = null;


}

?>
 
</body>

</html>