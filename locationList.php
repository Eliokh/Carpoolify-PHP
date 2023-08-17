<?php
require_once "login pages/conn.php";
// Execute a query to select the relevant data from the database table
$sql = "SELECT locationName FROM locations";
$result = mysqli_query($conn, $sql);

// Loop through the query results to output the list items
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<li data-name="' . $row["locationName"] . '">' . $row["locationName"] . '</li>';
  }
}


// Close the database connection
//mysqli_close($conn);
?>


