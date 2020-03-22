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
            <h1>Add A Veterinarian</h1>
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
                        <h3>Vet Name:</h3>
                    </label>
                    <input type="text" class="form-control" name="vet_name">
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
    $sql = 'SELECT MAX(vet_id) AS "length" FROM vet';
    $result = $conn->query($sql);
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        $counter =  $row["length"][0];
    }
    $iterator_id =  $counter + 1;
    /*ID iterator end */

    $sql = "INSERT INTO vet (vet_id, name) VALUES ('".$iterator_id."','".$_POST['vet_name']."')";
    
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

?>
 
</body>

</html>