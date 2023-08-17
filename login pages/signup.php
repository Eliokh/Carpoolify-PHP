<?php
    session_start();
    
    require_once "conn.php";
    require_once "domain_exists.php";

    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['phone'])) {

        $stmt = mysqli_stmt_init($conn);

        // get the inputted data
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $name = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['pass'];
        $p = md5($password);

        // basic email format check
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "not_valid";
        }
        elseif(!domain_exists($email)) // domain check
        {
            $_SESSION['error'] = "not_valid";
        }
        else // check if email was already created
        {
            if (mysqli_stmt_prepare($stmt,"SELECT * FROM users WHERE userEmail=?")) { // sql injection protection
                // bind parameters
                mysqli_stmt_bind_param($stmt,"s", $email);
                // execute query
                mysqli_stmt_execute($stmt);
                // bind result variables
                $result = mysqli_stmt_get_result($stmt);
                // close statement
                $stmt->close();
            }

            if ($result->num_rows > 0) {
                $_SESSION['error'] = "User_exists";
            }
            else {
                $stmt2 = mysqli_stmt_init($conn);//init
                if(mysqli_stmt_prepare($stmt2,"INSERT INTO users (userFirstName,userLastName,userName,userEmail,userPassword,userPhone) 
                VALUES (?,?,?,?,?,?)"))//insert query prepare
                {
                    mysqli_stmt_bind_param($stmt2,"ssssss",$fName,$lName,$name, $email,$p,$phone); //bind variables
                    $stmt2->execute();
                    $result = mysqli_stmt_get_result($stmt2);
                
                    //check if the query was successful
                    if(mysqli_stmt_affected_rows($stmt2) > 0) {
                        $_SESSION['success'] = "Account created successfully";
                        header("location: login.html");//redirect to the login page
                        exit();
                    } else {
                        $_SESSION['error'] = "Account creation failed";
                        header("Location: signup.html?stat=failure");
                    }
                    // close statement
                    $stmt2->close();
                }
            }
        }
        header("location: signup.html?stat=failure");//redirect to the signup page
        exit();
    }
?>
