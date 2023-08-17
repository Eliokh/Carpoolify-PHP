<?php

session_start();
if (!isset($_SESSION['userID']) || ($_SESSION['userID'] == '')) {
    header("Location: ./login.html");
    exit();
} else {
    $userID = $_SESSION['userID'];
}


$statuses = ['Ended', 'Cancelled', 'Rejected'];

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rides</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- JQuery -->
    <script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .table thead th {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 123, 255, 0.1);
        }
    </style>
</head>
<body>
    
<div class="container">
    
      <!-- GO BACK HOME BUTTON -->
      <a href="../index.php">
        <div id="home_btn">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            fill="currentColor"
            class="bi bi-house-door-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"
            />
          </svg>
        </div>
      </a>
<h1 class="text-center mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #007bff;">All My Rides</h1>

    <?php
    // database connection
    require_once "conn.php";
    // retrieve all rides from the database
    //$idS = $_POST["id"];
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, "SELECT rides.rideID, rides.startDate, rides.nbPassengers, rides.maxCapacity, statuses.statusName FROM users, statuses, rides WHERE rides.driverID = ? AND rides.statusID = statuses.statusID AND rides.driverID = users.userID")) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "s", $userID);
        // Execute query
        mysqli_stmt_execute($stmt);
        // Bind result variables
        mysqli_stmt_bind_result($stmt, $id, $date, $nbrPassengers, $Capacity, $status);
        $drives = array();
        while (mysqli_stmt_fetch($stmt)) {
            $tmp = array();
            $tmp['id'] = $id;
            $tmp['date'] = $date;
            $tmp['nbrPass'] = $nbrPassengers;
            $tmp['Capacity'] = $Capacity;
            $tmp['status'] = $status;
            array_push($drives, $tmp);
        }
        // Close statement
        $stmt->close();
    }

// display all rides in a table and enable user to make review:
echo '<div class="table-responsive"><table class="table table-striped">';
echo '<thead><tr><th>Date</th><th>Number of Passengers</th><th>Max Capacity</th><th>Status</th><th>Review</th><th>Action</th></tr></thead><tbody>';
foreach ($drives as $drive) {
    $date = date("Y-m-d H:i:s", strtotime($drive['date']));
    echo "<tr><td>" . $date . "</td><td>" . $drive['nbrPass'] . "</td><td>" . $drive['Capacity'] . "</td><td>" . $drive['status'] . "</td>";
    if (array_key_exists('id', $drive) && $drive['status'] == "Ended") {
        echo "<td><a href='makeReview.php?reviewedId=".$drive['id']."&rideID=".$drive['id']."'><button class='btn btn-primary'>Make a Review</button></a></td>";
    } else if (array_key_exists('id', $drive)){
        echo "<td><button disabled class='btn btn-dark'>Make a Review</button></td>";

    } else{
        echo "<td></td>";
    }
   
    if (in_array($drive['status'], $statuses)){
        echo '<form method="POST" action="cancelRide.php">
        <input type="hidden" name="id" value="'. $drive['id'] .'">
        <td> <button class="btn btn-dark" disabled>Cancel Ride</button></td></tr>
        </form>';
    }
    else{
        echo '<form method="POST" action="cancelRide.php">
        <input type="hidden" name="id" value="'. $drive['id'] .'">
        <td> <button class="btn btn-danger" type="submit" onclick="return confirm(`Are you sure you want to cancel this ride?`)">Cancel Ride</button></td></tr>
        </form>';
    }


   
   
}
echo "</tbody></table></div>";




// close database connection
mysqli_close($conn);
?>
</div>


<!-- <script>
function deleteRide(rideID) {
  if (confirm("Are you sure you want to cancel this ride?")) {
    // send an AJAX request to delete the ride
    $.ajax({
      url: "cancelRide.php",
      method: "POST",
      data: {id: rideID},
      success: function(result) {
        // reload the page to update the table
        location.reload();
      },
      error: function(xhr, status, error) {
        alert("Error: " + error);
      }
    });
  }
}
</script> -->


<script>
    document.getElementById("elio").disabled = true;

</script>

<!-- include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9"></script>
</body>
</html>


