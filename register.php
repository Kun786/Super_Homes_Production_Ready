<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SuperHomes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <!-- sub header start -->
    <div class="header">
        <a class="navbar-brand" href="#"><i class="fas fa-phone-alt"></i> +923314097772</a>
        <form class="form-inline">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Property Id</label>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Property Id">
                <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- sub header end -->
    <!-- main header start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">SuperHomes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Buy
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="saleHouses.php">House</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="salePlots.php">Plots</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="saleCommercial.php">Commercial</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Rent
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="rentHouses.php">House</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="rentCommercials.php">Commercial</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item active" data-toggle="tooltip" data-placement="bottom" title="Login">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- main header end -->
    <!-- login form start -->
    <div class="form">
        <form class="form-signin" method="post">
            <h2 class="text-center mb-5">Register</h2>

            <div class="form-label-group">
                <input type="text" id="inputPassword" name="name" class="form-control" placeholder="Name" required autofocus>
                <label for="inputPassword">Name</label>
            </div>

            <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
            </div>

            <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>
            <div class="form-label-group">
                <input type="number" name="mobile" id="inputPassword" class="form-control" placeholder="Mobile Number" required>
                <label for="inputPassword">Mobile Number</label>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-label-group">
                        <input type="date" name="dob" id="inputPassword" class="form-control" placeholder="Date of Birth" required>
                        <label for="inputPassword">Date of Birth</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-lg btn-outline-dark btn-block" name="submit" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-muted text-center">already have an account! <a class="text-dark" href="login.php">Sign in</a></p>
            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $mobile = $_POST['mobile'];
                $dob = $_POST['dob'];
                $selectQuery = "SELECT * FROM admin";
                $fireSelectQuery = $conn->query($selectQuery);
                $users = mysqli_num_rows($fireSelectQuery);
                if ($users >= 1) {
                    $status = 0;
                } else {
                    $status = 1;
                }
                if ($name == '' and $email == '' and $password == '' and $mobile == '' and $dob == '') {
                    echo "<div class='alert alert-warning'>Please fill all fields</div>";
                } else {
                    $insertQuery = "INSERT INTO admin(name, email, password, mobile, dob, status)VALUES('$name','$email','$password','$mobile', '$dob', '$status')";
                    $fireInsertQuery = $conn->query($insertQuery);
                    if ($fireInsertQuery) {
                        echo "<div class='alert alert-success'>Registered Successfully!</div>";
                    }
                }
            }
            ?>
        </form>
    </div><br>
    <!-- login form end -->
    <!-- footer section start -->
    <footer class="text-center">
        Copyright Superhomes | All Rights Reserved
    </footer>
    <!-- footer section end -->
</body>

</html>