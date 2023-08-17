<!-- JQuery -->
<script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script>

<script>
  function setNbPassengers(nb){
    $('#modalNbPassengers').val(nb);
  }
</script>
<!-- Modal -->
<div class="modal fade" id="requestRideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="requestAvailableRide.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Enter Message for driver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <textarea id="detailsTextArea" required name="detailsTextArea" class="form-control" placeholder="Enter Details"></textarea>
          <input id="modalRideID" type="hidden" name="rideID" />
          <input id="modalNbPassengers" type="hidden" name="nbPassengers" />
          <input id="modalDetails" type="hidden" name="details" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="submit" id="submitRequestBtn" class="btn btn-primary">Submit Request</button>
      </div>
      
      </form>
    </div>
  </div>
</div>

<?php

//search for both src and dest
if (isset($_POST["src"]) && isset($_POST["dest"]) && isset($_POST["date"]) && isset($_POST["nbPassengers"])) {
  require_once "conn.php";
  $stmt = mysqli_stmt_init($conn);
  $param1 = $_POST["src"];
  $param2 = $_POST["dest"];
  $param3 = $_POST["date"];
  $param4 = $_POST["nbPassengers"];

  echo "<script>setNbPassengers(" . $param4 . ")</script>";

  //if (mysqli_stmt_prepare($stmt, "SELECT rides.sourceID, rides.destinationID, rides.startDate, rides.nbPassengers, users.userFirstName, users.userLastName FROM rides, users, locations A, locations B, statuses WHERE rides.driverID = users.userID AND rides.statusID = statuses.statusID AND statuses.statusName = 'Starting Soon' AND rides.driverID = users.userID AND rides.sourceID = A.locationID AND A.locationName = ? AND rides.destinationID = B.locationID AND B.locationName = ? AND rides.startDate = ? AND rides.maxCapacity >= ?")) {
    if (mysqli_stmt_prepare($stmt, "SELECT l1.locationName AS sourceName, l2.locationName AS destinationName, rides.startDate, rides.nbPassengers, users.userFirstName, users.userLastName, rides.rideID FROM rides 
    JOIN users ON rides.driverID = users.userID
    JOIN locations AS l1 ON rides.sourceID = l1.locationID
    JOIN locations AS l2 ON rides.destinationID = l2.locationID
    JOIN statuses ON rides.statusID = statuses.statusID
    WHERE statuses.statusName = 'Starting Soon' 
    AND l1.locationName = ? 
    AND l2.locationName = ? 
    AND DATE(rides.startDate) = ? 
    AND rides.maxCapacity >= ?")) {
      
    mysqli_stmt_bind_param($stmt, "sssi", $param1, $param2, $param3, $param4);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $sourceID, $destinationID, $startDate, $nbPassengers, $firstName, $lastName, $rideID);
    $rides = array();
    while (mysqli_stmt_fetch($stmt)) {
      $tmp = array(); 
      $tmp['rideID'] = $rideID;
      $tmp['src'] = $sourceID;
      $tmp['dest'] = $destinationID;
      $tmp['date'] = $startDate;
      $tmp['nbPassengers'] = $nbPassengers;
      $tmp['name'] = $firstName . " " . $lastName;
      array_push($rides, $tmp);
    }
  }

    // Close statement
    $stmt -> close();
  }




//search for just dest
// else if (isset($_POST["dest"])) {

//   require_once "conn.php";
//   $stmt = mysqli_stmt_init($conn);
 
//   $param1 = $_POST["dest"];
//   $param3 = $_POST["id"];
// if ( mysqli_stmt_prepare($stmt,"SELECT rides.rideID,users.userName,rides.startDate,A.locationName,B.locationName FROM rides,users,locations A,locations B,statuses WHERE rides.driverID !=? AND rides.driverID = users.userID AND rides.statusID = statuses.statusID AND statuses.statusName = 'Starting Soon'AND rides.destinationID = B.locationID AND B.locationName=? AND rides.sourceID = A.locationID ")) 
// {
//   mysqli_stmt_bind_param($stmt,"ss",$param3 ,$param1);
//     // Execute query
//      mysqli_stmt_execute($stmt);
//     // Bind result variables
//     mysqli_stmt_bind_result($stmt,$id,$name,$date,$source,$destination);
//     $ride = array();
//     while(mysqli_stmt_fetch($stmt)){
//         $tmp = array(); 
//         $tmp['id'] = $id;
//         $tmp['name'] = $name;
//         $tmp['date'] = $date;
//         $tmp['src'] = $source;
//         $tmp['dest'] = $destination;
//         array_push($ride,$tmp);
//     }
//     // Close statement
//     $stmt -> close();
//   }
// echo json_encode($ride);
// }


// //search for just src
// else if (isset($_POST["src"])) {

//   require_once "conn.php";
//   $stmt = mysqli_stmt_init($conn);
//   $param1 = $_POST["src"];
//   $param3 = $_POST["id"];

// if ( mysqli_stmt_prepare($stmt,"SELECT rides.rideID,users.userName,rides.startDate,A.locationName,B.locationName FROM rides,users,locations A,locations B,statuses WHERE rides.driverID !=? AND rides.driverID = users.userID AND rides.statusID = statuses.statusID AND statuses.statusName = 'Starting Soon'AND rides.sourceID = A.locationID AND A.locationName=? AND rides.destinationID = B.locationID")) 
// {
//   mysqli_stmt_bind_param($stmt,"ss",$param3, $param1);
//     // Execute query
//      mysqli_stmt_execute($stmt);
//     // Bind result variables
//     mysqli_stmt_bind_result($stmt,$id,$name,$date,$source,$destination);
//     $ride = array();
//     while(mysqli_stmt_fetch($stmt)){
//         $tmp = array(); 
//         $tmp['id'] = $id;
//         $tmp['name'] = $name;
//         $tmp['date'] = $date;
//         $tmp['src'] = $source;
//         $tmp['dest'] = $destination;
//         array_push($ride,$tmp);
//     }
//     // Close statement
//     $stmt -> close();
//   }
// echo json_encode($ride);
// }

// ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carpoolify</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <!-- <link
      rel="stylesheet"
      type="text/css"
      href="vendor/bootstrap/css/bootstrap.min.css"
    /> -->

    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/iconic/css/material-design-iconic-font.min.css"
    />

    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />

    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/css-hamburgers/hamburgers.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/animsition/css/animsition.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/daterangepicker/daterangepicker.css"
    />

    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
  </head>


  <body>
  <div class="container">

    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="display-4" style="background-color: #007bff; color: #fff; padding: 20px;
       border-radius: 10px; box-shadow: 0px 5px 10px rgba(0,0,0,0.3); transition: all 0.3s;">Search Results</h1>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <thead class="bg-primary text-white">
            <tr>
              <th>Driver Name</th>
              <th>Start Date</th>
              <th>Source Location</th>
              <th>Destination Location</th>
              <th>REQUEST HERE!</th>
            </tr>
          </thead>
          <tbody>
          <?php 
if (isset($rides)) {
  foreach ($rides as $result) { ?>
  <tr>
  <td id="request"><?php echo $result['name']; ?></td>
  <td id="date"><?php echo $result['date']; ?></td>
  <td id="src"><?php echo $result['src']; ?></td>
  <td id="dest"><?php echo $result['dest']; ?></td>
  <td>
    <!-- <a href="requestAvailableRide.php">
      <button class="btn btn-primary">Request Ride</button>
    </a> -->
    <button type="button" data-rideID="<?php echo $result['rideID']?>" class="btn btn-primary requestRideBtn" data-toggle="modal" data-target="#requestRideModal">Request Ride</button>
  </td>
</tr>
<?php } 
} else {
  echo "<p>No results found.</p>";
} ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>


</html>

<script>
// Attach event listener to button
$('.requestRideBtn').on('click', function() {
  // Show modal
  $('#requestRideModal').modal('show');

  rideID = $(this).data('rideid');
  $('#modalRideID').val(rideID);
});

$('#requestRideModal .close').on('click', function(){
  $('#requestRideModal').modal('hide');
})

$('#submitRequestBtn').on('click', function(){
  $('#modalDetails').val($('#detailsTextArea').val());
})
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

