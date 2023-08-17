<?php
session_start(); 
if (!isset($_SESSION['userID']) || ($_SESSION['userID'] == '')) {
    header("Location: ./login.html");
    exit();
} else {
    $userID = $_SESSION['userID'];
}

// database connection
require_once "conn.php";

if(isset($_POST["id"])) {
    $rideID = $_POST["id"];
    //var_dump($rideID);

    
    // delete the ride from the database
    $stmt = mysqli_stmt_init($conn);
   // if (mysqli_stmt_prepare($stmt, "DELETE FROM rides WHERE rideID=?")) {
    if (mysqli_stmt_prepare($stmt, "DELETE FROM rides WHERE rideID=? AND driverID=?")) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ii", $rideID, $userID);
        // Execute query
        mysqli_stmt_execute($stmt);
        // Close statement
        $stmt->close();
        // return success message
        header("location: displayRides.php");
    } else {
        //echo "Error deleting ride.";
        header("location: displayRides.php");
    }
    
    // close database connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>

