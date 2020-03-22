<!--beginning of input-->
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

        <div class="form-group">
            <label for="org_owner">
                <h3>Owner of Rescue Organization:</h3>
            </label>
            <select class = "form-control" name = org_owner>
            ';
    $sql = 'SELECT employee_id, employee_fname, employee_lname FROM employee';
    $result = $conn->query($sql);
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row["employee_id"]."'>".$row["employee_fname"]." ".$row["employee_lname"]."</option>";
    }
            
            
            echo'
            </select>
        </div>

    </div>
    <div class="col-2"></div>
</div>


<!--end of input-->