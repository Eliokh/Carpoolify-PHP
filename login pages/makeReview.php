<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make a Review</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
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
        label {
            font-weight: bold;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

      
       
    </style>
</head>
<body>



<div class="container">
<h1 class="text-center mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #007bff;">Make a Review</h1>
<form method="POST" action="makeReview.php">
    <!-- <div class="form-group row">
        <label for="userId" class="col-sm-2 col-form-label">Reviewer ID:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="userId" name="userId" required>
        </div>
    </div> -->
    <!-- <div class="form-group row">
        <label for="reviewedId" class="col-sm-2 col-form-label">:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="reviewedId" name="reviewedId" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="rideId" class="col-sm-2 col-form-label">Ride ID:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="rideId" name="rideId" required>
        </div>
    </div> -->
    <!-- <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Type:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
    </div> -->
    <div class="form-group row">
        <label for="details" class="col-sm-2 col-form-label">Details:</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
        </div>
    </div>
    <div class="form-group row">
    <label for="rating" class="col-sm-2 col-form-label">Rating:</label>
    <div class="col-sm-10">
        <select class="form-control" id="rating" name="rating" required>
            <?php
            for ($i = 1; $i <= 5; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
    </div>
</div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <a href="displayRidesAsPassenger.php" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
