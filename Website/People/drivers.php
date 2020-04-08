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
            <h1>Find Drivers from Organization</h1>
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
                    <select class = "form-control" name = "org_id">';

foreach ($dbh ->query('SELECT organization_name, organization.organization_id FROM organization join rescue on rescue.organization_id = organization.organization_id') as $row) {
    echo "<option value='" . $row["organization_id"] . "'>" . $row["organization_name"] . "</option>";
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
    <table>
        <thead>
            <tr>
                <th>
                Name
                </th>
                <th>
                Phone number
                </th>
                <th>
                License plate
                </th>
                <th>
                License number
                </th>
            </tr>
        </thead>
        <tbody>
';

if(isset($_POST["submit"])){
    $organizationId = $_POST['org_id'];
    foreach($dbh->query("SELECT driver_fname, driver_lname, driver_phone, driver_license_plate, driver_license_number FROM driver where driver.organization_id = $organizationId") as $row) {
        echo "<tr><td>" . $row["driver_fname"] ." ". $row["driver_lname"] . "</td><td>" . $row["driver_phone"] . "</td><td>" . $row["driver_license_plate"] . "</td><td>" . $row["driver_license_number"] . "</td></tr>";
    }

}
$dbh = null;
echo '</tbody></table></div><div class="col-2"></div></div>';

?>

</body>

</html>