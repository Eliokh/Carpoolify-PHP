<?php 

if(isset($_POST['userId']) && isset($_POST['seats']) && isset($_POST['source']) && isset($_POST['destination'])) {
    $id = $_POST['userId'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $details = $_POST['notes'];
    $max = $_POST['seats'];
    $src = $_POST['source'];
    $dest = $_POST['destination'];
    
    //echo $id;
    $datetime = date("Y-m-d H:i:s", strtotime("$date $time"));
    echo $datetime;

    require_once "conn.php";
    $stmt = mysqli_stmt_init($conn);
    /*$sql = "INSERT INTO rides (startDate, maxCapacity, details, driverID, sourceID, destinationID, statusID) 
    VALUES ($date, $max, '$details', $id, (SELECT locationID FROM locations WHERE locationName = '$src'), (SELECT locationID FROM locations WHERE locationName = '$dest'), (SELECT statusID FROM statuses WHERE statusName = 'Starting soon'))";

    if(mysqli_stmt_prepare($stmt, $sql)) { // insert query prepare
        echo "blabla";
        mysqli_stmt_bind_param($stmt, "ssssss", $date, $max, $details, $id, $src, $dest); // bind variables*/
        $sql = "INSERT INTO rides (startDate, maxCapacity, details, driverID, sourceID, destinationID, statusID) 
    VALUES (?, ?, ?, ?, (SELECT locationID FROM locations WHERE locationName = ?), (SELECT locationID FROM locations WHERE locationName = ?), (SELECT statusID FROM statuses WHERE statusName = 'Pending'))";

$stmt = mysqli_prepare($conn, $sql);

// bind parameters to statement
mysqli_stmt_bind_param($stmt, "sissss", $datetime, $max, $details, $id, $src, $dest);

// execute statement
//mysqli_stmt_execute($stmt);

        $stmt->execute();
        // check if the query was successful
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            //echo mysqli_stmt_insert_id($stmt);
            header("Location: ../index.php?postride=success");
        } else {
            //echo "failure";
            header("Location: ../index.php?postride=failure");
        }   
        $stmt->close();
    }

?>


<!--    
    VALUES (?, ?, ?, ?, ?, ?, (SELECT statusID FROM statuses WHERE statusName = 'Starting soon'))";
-->