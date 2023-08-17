<?php
session_start();

// Display success message if available in session
if (isset($_SESSION['success'])) {
    echo "<p class='success'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}


// Include database connection
require_once "conn.php";

// Check if username and password are submitted
if (isset($_POST['username']) && isset($_POST['pass'])) {
    $stmt = mysqli_stmt_init($conn);
    $user_name = $_POST["username"];
    $password = $_POST["pass"];
    $hashed = md5($password);

    // Prepare and execute query to check if user exists with the given username and password
    if (mysqli_stmt_prepare($stmt,"SELECT userID FROM users WHERE userName=? AND userPassword=?")) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt,"ss", $user_name,$hashed);
        // Execute query
        mysqli_stmt_execute($stmt);
        // Bind result variables
        mysqli_stmt_bind_result($stmt,$id);
        if(mysqli_stmt_fetch($stmt)){

            // Set session variable
            $_SESSION['userID'] = $id;
            header("location:../index.php");// Redirect to the index page
            exit();
        } else {
            header("location: login.html?stat=failure"); // Redirect to the login page
            exit();
        }
        // Close statement
        $stmt->close();
    } else {
        header("location: login.html?stat=failure"); // Redirect to the login page
        exit();
    }
} else {
    header("location: login.html?stat=failure"); // Redirect to the login page
    exit();
}
?>

