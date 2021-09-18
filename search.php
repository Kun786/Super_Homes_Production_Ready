<?php require("connection.php"); ?>
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
  <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/cardDesign.css">
  <link rel="stylesheet" href="css/timeline.css">
  <style>
    .status {
      background: #ff0000;
      color: white;
      padding: 5px;
      border-radius: 4px 0px 0px 4px;
      position: absolute;
      z-index: 1;
      top: 5px;
      right: 116px;
    }
  </style>
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
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Buy
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="saleHouses.php">House</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="salePlots.php">Plots</a>
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
          <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Login">
            <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- main header end -->
  <!-- parallex section start -->
  <div class="parallex">
    <h2 class="text-light">Sales Plots</h2>
  </div>
  <!-- parallex section end -->
  <!-- ads section start -->
  <div class="container-fluid">
    <div class="row">
      <?php
      $query = "SELECT * FROM ads WHERE status=1 and purpose='Sale' and type = 'Residentional Plot' or status=1 and purpose = 'Sale' and type = 'Commercial Plot' ORDER BY Id DESC";
      $run = $conn->query($query);
      while ($data = mysqli_fetch_array($run)) {
        $id = $data['id'];
        $images = $data['img'];
        if ($images) {
          $img = 'uploads/' . $images;
        } else {
          $img = "imgs/no-image.jpg";
        }
        $society = $data['society'];
        $phase = $data['phase'];
        $block = $data['block'];
        $societyQuery = "SELECT * FROM socities WHERE id = '$society'";
        $runsociety = $conn->query($societyQuery);
        $societyName = mysqli_fetch_array($runsociety);
        $phaseQuery = "SELECT * FROM phases WHERE id = '$phase'";
        $firePhase = $conn->query($phaseQuery);
        $phaseName = mysqli_fetch_array($firePhase);
        $blockQuery = "SELECT * FROM blocks WHERE id = '$block'";
        $fireBlock = $conn->query($blockQuery);
        $blockName = mysqli_fetch_array($fireBlock);
      ?>
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-4 mb-4">
          <div class="container">
            <div class="blog-post">
              <div class="status">SUPER HOT</div>
              <div class="blog-post-img">
                <img src="<?php echo $img; ?>">
              </div>
              <div class="blog-info">
                <div class="blog-post_date">
                  <span><?php echo $data['type']; ?></span>
                  <span><?php echo $societyName['name']?> <?php echo $phaseName['name']?> <?php echo $blockName['name']?></span>
                </div>
                <h1 class="blog-title">PKR <?php echo $data['price']; ?></h1>
                <small>Area : <?php echo $data['area']; ?> <?php echo $data['areaUnit'] ?></small><br>
                <p class="blot-text">
                  <?php echo $data['title']; ?>
                </p>
                <a href="viewAd.php?id=<?php echo $id; ?>" class="blog-post-cta">View Details</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <?php
      $query = "SELECT * FROM ads WHERE status=2 and purpose='Sale' and type = 'Residentional Plot' or status=2 and purpose = 'Sale' and type = 'Commercial Plot' ORDER BY Id DESC";
      $run = $conn->query($query);
      while ($data = mysqli_fetch_array($run)) {
        $id = $data['id'];
        $images = $data['img'];
        if ($images) {
          $img = 'uploads/' . $images;
        } else {
          $img = "imgs/no-image.jpg";
        }
        $society = $data['society'];
        $phase = $data['phase'];
        $block = $data['block'];
        $societyQuery = "SELECT * FROM socities WHERE id = '$society'";
        $runsociety = $conn->query($societyQuery);
        $societyName = mysqli_fetch_array($runsociety);
        $phaseQuery = "SELECT * FROM phases WHERE id = '$phase'";
        $firePhase = $conn->query($phaseQuery);
        $phaseName = mysqli_fetch_array($firePhase);
        $blockQuery = "SELECT * FROM blocks WHERE id = '$block'";
        $fireBlock = $conn->query($blockQuery);
        $blockName = mysqli_fetch_array($fireBlock);
      ?>
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-4 mb-4">
          <div class="container">
            <div class="blog-post">
              <div class="status">HOT</div>
              <div class="blog-post-img">
                <img src="<?php echo $img; ?>">
              </div>
              <div class="blog-info">
                <div class="blog-post_date">
                  <span><?php echo $data['type']; ?></span>
                  <span><?php echo $societyName['name']?> <?php echo $phaseName['name']?> <?php echo $blockName['name']?></span>
                </div>
                <h1 class="blog-title">PKR <?php echo $data['price']; ?></h1>
                <small>Area : <?php echo $data['area']; ?> <?php echo $data['areaUnit'] ?></small><br>
                <p class="blot-text">
                  <?php echo $data['title']; ?>
                </p>
                <a href="viewAd.php?id=<?php echo $id; ?>" class="blog-post-cta">View Details</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <?php
      $query = "SELECT * FROM ads WHERE status=0 and purpose='Sale' and type = 'Residentional Plot' or status=0 and purpose = 'Sale' and type = 'Commercial Plot' ORDER BY Id DESC";
      $run = $conn->query($query);
      while ($data = mysqli_fetch_array($run)) {
        $id = $data['id'];
        $images = $data['img'];
        if ($images) {
          $img = 'uploads/' . $images;
        } else {
          $img = "imgs/no-image.jpg";
        }
        $society = $data['society'];
        $phase = $data['phase'];
        $block = $data['block'];
        $societyQuery = "SELECT * FROM socities WHERE id = '$society'";
        $runsociety = $conn->query($societyQuery);
        $societyName = mysqli_fetch_array($runsociety);
        $phaseQuery = "SELECT * FROM phases WHERE id = '$phase'";
        $firePhase = $conn->query($phaseQuery);
        $phaseName = mysqli_fetch_array($firePhase);
        $blockQuery = "SELECT * FROM blocks WHERE id = '$block'";
        $fireBlock = $conn->query($blockQuery);
        $blockName = mysqli_fetch_array($fireBlock);
      ?>
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-4 mb-4">
          <div class="container">
            <div class="blog-post">
              <div class="blog-post-img">
                <img src="<?php echo $img; ?>">
              </div>
              <div class="blog-info">
                <div class="blog-post_date">
                  <span><?php echo $data['type']; ?></span>
                  <span><?php echo $societyName['name']?> <?php echo $phaseName['name']?> <?php echo $blockName['name']?></span>
                </div>
                <h1 class="blog-title">PKR <?php echo $data['price']; ?></h1>
                <small>Area : <?php echo $data['area']; ?> <?php echo $data['areaUnit'] ?></small><br>
                <p class="blot-text">
                  <?php echo $data['title']; ?>
                </p>
                <a href="viewAd.php?id=<?php echo $id; ?>" class="blog-post-cta">View Details</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- ads section end -->
  <!-- footer section start -->
  <footer class="text-center">
    Copyright Superhomes | All Rights Reserved
  </footer>
  <!-- footer section end -->
</body>
<script>
  $(document).ready(function() {
    $('.rent').hide();
    $('#sale').click(function() {
      $('.sale').show();
      $('.rent').hide();
      $("#rent").removeClass("activeForm");
      $("#sale").addClass("activeForm");
    });
    $('#rent').click(function() {
      $('.sale').hide();
      $('.rent').show();
      $("#sale").removeClass("activeForm");
      $("#rent").addClass("activeForm");
    });
  });
</script>

</html>