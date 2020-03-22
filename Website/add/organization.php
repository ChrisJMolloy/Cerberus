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
            <h1>Add An Organization</h1>
        </div>
        <div class="col-2"></div>
    </div>
<!-- beginning of form-->   
    <form>
        <!-- beginning of input-->

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <div class="form-group">
                    <label for="org_name">
                        <h3>Organization Name:</h3>
                    </label>
                    <input type="text" class="form-control" id="org_name">
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
            <input type="text" class="form-control" id="org_street">
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
            <input type="text" class="form-control" id="org_city">
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
            <input type="text" class="form-control" id="org_province">
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
            <input type="text" class="form-control" id="org_postal">
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
            <input type="number" class="form-control" id="org_phone">
        </div>

    </div>
    <div class="col-2"></div>
</div>


<!--end of input-->
<!--beginning of input-->
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

    <button type="submit" class="btn btn-primary">Submit</button>

    </div>
    <div class="col-2"></div>
</div>


<!--end of input-->
</form>
<!-- end of form-->  
';
?>
 
</body>

</html>