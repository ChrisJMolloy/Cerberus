<?php
//header for all pages
//always put   </body> </html> at the end of a file
include('header.html');
//connection to DB
include('connection.php');
/*
//always use '' for echo's, keep things consistent
echo'
<div class="container">
<div class="row">
<div class="col-4"></div>
<div class="col-4">



';

$sql = "SELECT animal_id, species FROM animal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Animal ID</th>
      <th scope="col">Species</th>
    </tr>
  </thead>
  <tbody>
    
    
    ';




    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['animal_id']. '</td><td> ' . $row['species']. '</td></tr> ';
    }
    echo' </tbody>
        </table>';
} else {
    echo "0 results";
}
$conn->close();
echo'</div>
<div class="col-4"></div>


</div>

</div>'*/
?>
<header class="bg-primary">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12">
                    <div class="text-center m-0 vh-100 d-flex flex-column justify-content-center text-light">
                        <h1 class="display-3" style="font-weight: 500">SAVE A LIFE TODAY!</h1>
                        <p class="lead" style="font-weight: 500">Browse our Available Pets below</p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
  </body>
</html>