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
            <h1>View our Contributors</h1>
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
                <label for="contributor_name">
                    <h3>Contributor:</h3>
                </label>
                <select class = "form-control" name = "contributor_name">
                ';

foreach ($dbh ->query('SELECT DISTINCT donation_fname, donation_lname FROM donation') as $row) {
    echo "<option value='" . $row["donation_fname"] ."*". $row["donation_lname"] . "'>" . $row["donation_fname"] ." ". $row["donation_lname"] . "</option>";
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

    <button type="submit" class="btn btn-primary" name="submit">View</button>

    </div>
    <div class="col-2"></div>
</div>


<!--end of input-->
</form>
<!-- end of form-->  
';
if (isset($_POST["submit"])) {

    $full_name = explode("*",$_POST["contributor_name"]);
    $fname = $full_name[0];
    $lname = $full_name[1];
 
   echo '
   
   <div class="row" style="padding-top:20px;">
       <div class="col-2"></div>
       <div class="col-8">
       <h3>'; 
       echo $fname . " ". $lname;
       echo'</h3>
          
       </div>
       <div class="col-2"></div>
   </div>
   <div class="row" style="padding-top:20px;">
   <div class="col-2"></div>
   <div class="col-8">
  <table class="table">
  <thead>
  <tr>
  <th>Organization</th>
  <th>Amount</th>
  </tr>
  </thead>
  <tbody>
  
 
   
   ';
   $total_donated = 0;
   foreach ($dbh ->query('SELECT SUM(donation_amount) AS Payment, organization_name FROM donation, organization WHERE donation.organization_id = organization.organization_id AND donation_fname = "'.$fname.'" AND donation_lname = "'.$lname.'" GROUP BY donation.organization_id') as $row) {
    $total_donated += $row["Payment"];
    echo "<tr>";
    echo "<td>".$row['organization_name'] ."</td><td>".$row["Payment"]."</td>";
    echo "</tr>";
      }
      $dbh = null;
   echo' </tbody>
   </table>
       
    </div>
    <div class="col-2"></div>
 </div>';
 echo'
 <div class="row" style="padding-top:20px;">
    <div class="col-2"></div>
    <div class="col-8">

    <h3>Total:';
    echo $total_donated;
    echo'</h3>

    </div>
    <div class="col-2"></div>
</div>
 ';
}

?>

</body>

</html>




