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
            <h1>Donations in 2018 by Organization</h1>
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
foreach ($dbh ->query('SELECT organization_name, organization.organization_id FROM organization') as $row) {
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
    Total Amount Donated in 2018:
';

if($_POST['org_id'] != -1){
    $organizationId = $_POST['org_id'];
    $result = $dbh->query("SELECT SUM(donation_amount) FROM donation WHERE (donation.donation_date<'20190101' AND donation.donation_date>'20171231') AND donation.organization_id = $organizationId")->fetch();
    #echo amount donated if query does not return null, otherwise echo 'none'
	if(isset($result[0])){
		echo $result[0];
	} else {
		echo "none";
	}
}

?>
</div></div></div>
</body>

</html>