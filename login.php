<?php require("connection.php"); session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SuperHomes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- sub header start -->
    <div class="header">
        <a class="navbar-brand" href="#"><i class="fas fa-phone-alt"></i> +923314097772</a>
        <form method="POST" action="searchById.php" class="form-inline">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Property Id</label>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" name="id" id="inlineFormInputGroupUsername2" placeholder="Property Id">
                <button class="btn btn-outline-dark" type="submit" name="submit"><i class="fas fa-search"></i></button>
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
                        <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- main header end -->
    <!-- login form start -->
    <div class="form">
    <?php if(isset($_POST['submit'])){
                $email=$_POST['email'];
                $password=$_POST['password'];
                $selectQuery="SELECT * FROM admin WHERE email='$email' and password='$password' and status='1'";
                $fireSelectQuery=$conn->query($selectQuery);
                $user=mysqli_num_rows($fireSelectQuery);
                if($user==1){
                    $_SESSION['email']=$email;
                    header("Location:dashboard.php");
                }else{
                    echo"<div class='alert alert-danger text-center'>Wrong Email/Password</div>";
                }}?>
        <form class="form-signin" method="post">
            <h3 class="text-dark text-center mb-5">Login <i class="fas fa-user-lock"></i></h3>
            <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
            </div>
            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>
            <button class="btn btn-outline-dark btn-lg btn-block" name="submit" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">if not registered! <a href="register.php" class="text-dark">Register</a></p>
        </form>
    </div><br>
    <!-- login form end -->
    <!-- footer section start -->
    <footer class="text-center">
        Copyright Superhomes | All Rights Reserved
    </footer>
    <!-- footer section end -->
</body>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
</html>