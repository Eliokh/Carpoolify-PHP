<?php

// First, make sure the user is logged in
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
} else {
  $userID = $_SESSION['userID'];
}


//echo "<script>alert(" . $_POST['details'] . ")</script>";

require_once "conn.php";
//if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["date"]) && isset($_POST["src"]) && isset($_POST["dest"])){
  if(isset($_POST["rideID"]) && isset($_POST["nbPassengers"]) && isset($_POST["details"])){
    //$id = $_POST["id"];
    $rideID = $_POST["rideID"];
    $nbPassengers = $_POST["nbPassengers"];
    $details = $_POST["details"];

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, "INSERT INTO requestride (requestDetails, nbPassengers, passengerID, rideID, statusID) VALUES (?, ?, ?, ?, (SELECT statusID FROM statuses WHERE statusName = 'Pending'))")) {
    //if ($stmt = mysqli_prepare($conn, "INSERT INTO requestride (requestDetails, nbPassengers, passengerID, rideID, statusID) VALUES (?, ?, ?, ?, (SELECT statusID FROM statuses WHERE statusName = 'Pending'), '')")) {
  
      //echo $userID;
      // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssss", $details, $nbPassengers, $userID, $rideID);
        
        //$details = $source . ' to ' . $destination . ' on ' . $date;
        //$number_of_passengers = 1; // assuming the user is requesting only for themselves
        //$user_id = 1; // assuming the user ID is always 1
        //$ride_id = $id;
        
        // Execute query
        mysqli_stmt_execute($stmt);
        // Bind result variables
        //mysqli_stmt_bind_result($stmt, $details, $number_of_passengers, $user_id, $ride_id, $status_id);
        //mysqli_stmt_fetch($stmt); // fetch only one row
        
        // store the data in an array
        //$result = array();
        //$result['id'] = $id;
        //$result['name'] = $name;
        //$result['date'] = $date;
        //$result['src'] = $source;
        //$result['dest'] = $destination;
        
        // Check if a row was affected
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            //echo "success";
        } else {
            //echo "failure";
            header("Location: searchRide.php");
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        //echo "failure";
        header("Location: searchRide.php");
    }
}


// Fetch user information from the database
// $user_id = $_SESSION['userID'];
// $sql = "SELECT * FROM users WHERE userID = $user_id";
// $result = mysqli_query($conn, $sql);
// $user = mysqli_fetch_assoc($result);

// Query the database for all rides requested by the user
//$sql = "SELECT * FROM requestride re, rides ri WHERE re.passengerID = $userID AND re.rideID = ri.rideID";
$sql = "SELECT 
CONCAT(users.userFirstName, ' ', users.userLastName) AS driverName, 
rides.startDate AS startDatetime,
source.locationName AS sourceLocation,
destination.locationName AS destinationLocation,
statuses.statusName AS rideStatus
FROM 
rides
INNER JOIN users ON rides.driverID = users.userID
INNER JOIN locations AS source ON rides.sourceID = source.locationID
INNER JOIN locations AS destination ON rides.destinationID = destination.locationID
INNER JOIN statuses ON rides.statusID = statuses.statusID
INNER JOIN requestride ON rides.rideID = requestride.rideID
WHERE 
requestride.passengerID = " . $userID;
$result = mysqli_query($conn, $sql);
?> 

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
       border-radius: 10px; box-shadow: 0px 5px 10px rgba(0,0,0,0.3); transition: all 0.3s;">Request Result:</h1>
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
              <th>Check your response!</th>
            </tr>
          </thead>
          <tbody>
          <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['driverName'] . "</td>";
                echo "<td>" . $row['startDatetime'] . "</td>";
                echo "<td>" . $row['sourceLocation'] . "</td>";
                echo "<td>" . $row['destinationLocation'] . "</td>";
                echo "<td>" . $row['rideStatus'] . "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>


</html>
