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
            <h1>Animal Rescues by Organization</h1>
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
                    <label for="vet_name">
                        <h3>Organization Name:</h3>
                    </label>
                    <select class = "form-control" name = "org_id">
                        <option value="-1">Any organization</option>';
foreach ($dbh ->query('SELECT organization_name, organization.organization_id FROM organization join rescue on rescue.organization_id = organization.organization_id') as $row) {
    echo "<option " . (isset($_POST["org_id"]) && $_POST['org_id'] == $row["organization_id"] ? "selected " : "")  . "value='" . $row["organization_id"] . "'>" . $row["organization_name"] . "</option>";
};

echo '
                    </select>
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
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
    <br/>
    Number of rescues in 2018:
';

if(isset($_POST["org_id"]) && $_POST['org_id'] != -1){
    $organizationId = $_POST['org_id'];
    $result = $dbh->query("SELECT count(animal_transfer_id) FROM animal_transfer join driver on animal_transfer.driver_id=driver.driver_id where animal_transfer.transfer_date<'20190101' and driver.organization_id = $organizationId")->fetch();
    echo $result[0];
}
else {
    $result = $dbh->query("SELECT count(animal_transfer_id) FROM animal_transfer join driver on animal_transfer.driver_id=driver.driver_id where animal_transfer.transfer_date<'20190101'")->fetch();
    echo $result[0];
}
$dbh = null;
?>
</div></div></div>
</body>

</html>