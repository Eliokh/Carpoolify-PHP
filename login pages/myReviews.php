
<?php

session_start();
if (!isset($_SESSION['userID']) || ($_SESSION['userID'] == '')) {
    header("Location: ./login.html");
    exit();
} else {
    $userID = $_SESSION['userID'];
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Reviews</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
<h1 class="text-center mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #007bff;">My Reviews</h1>

    <?php
    // database connection
    require_once "conn.php";
   
    // retrieve all reviews from the database
    if (isset($_POST["id"])) {
        $idS = $_POST["id"];
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT reviews.description, reviews.reviewType, reviews.rating, users.userName FROM users, reviews WHERE reviews.reviewedUserID = ? AND users.userID = reviews.reviewerID";
        if (mysqli_stmt_prepare($stmt, $sql)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "s", $idS);
            // Execute query
            mysqli_stmt_execute($stmt);
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $description, $reviewType, $rating, $userName);
            $reviews = array();
            while (mysqli_stmt_fetch($stmt)) {
                $tmp = array();
                $tmp['description'] = $description;
                $tmp['reviewType'] = $reviewType;
                $tmp['rating'] = $rating;
                $tmp['userName'] = $userName;
                array_push($reviews, $tmp);
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }}
    

    // display all reviews in a table
    echo '<div class="table-responsive"><table class="table table-striped">';
    echo '<thead><tr><th>Description</th><th>Type</th><th>Rating</th><th>Reviewer</th></tr></thead><tbody>';
    if (isset($reviews)) {
    foreach ($reviews as $review) {
        echo "<tr><td>" . $review['description'] . "</td><td>" . $review['reviewType'] . "</td><td>" . $review['rating'] . "</td><td>" . $review['userName'] . "</td></tr>";
    }
    echo "</tbody></table></div>";
    }
    // close database connection
    mysqli_close($conn);
    ?>
</div>

<!-- include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9"></script>
</body>
</html>
