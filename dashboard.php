<?php require("connection.php");
session_start();
if (!isset($_SESSION["email"])) {
  header("location:login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Jekyll v4.1.1" />
  <title>SuperHomes Dashboard</title>
  <script src="js/Chart.min.js"></script>
  <script src="js/utils.js"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/" />
  <script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    /* widgets styling start */
    .container {
      background: #f3f4f7;
      border-radius: 0px;
      padding: 20px;
    }

    .row .col {
      background-color: white !important;
    }

    .container .box {
      box-shadow: 3px 6px 12px rgba(0, 0, 0, 0.5);
      width: 100%;
      padding: 15px;
      border-radius: 0px;
      background: white;
    }

    .box:hover {
      cursor: pointer;
    }

    .box .icon {
      padding: 10px;
      border-radius: 0px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 70px;
    }

    .box1 .icon {
      background: rgba(96, 215, 154, 0.4);
      color: #0099e5;
    }

    .box2 .icon {
      background: rgba(215, 160, 96, 0.4);
      color: #f85a40;
    }

    .box3 .icon {
      background: rgba(122, 215, 96, 0.4);
      color: #0abf53;
    }

    .box4 .icon {
      background: rgba(229, 184, 62, 0.4);
      color: #fbb034;
    }

    .btn-outline-dark {
      border-radius: 0px;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SuperHomes</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-light w-100" type="text" placeholder="Search ad by id" aria-label="Search" />
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#"><span data-feather="mail"></span></a>
      </li>
    </ul>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#"><span data-feather="bell"></span></a>
      </li>
    </ul>
    <ul class="navbar-nav px-3">
      <?php
      $email = $_SESSION['email'];
      $nameQuery = "SELECT * FROM admin WHERE email='$email'";
      $runName = $conn->query($nameQuery);
      $adminName = mysqli_fetch_array($runName);
      ?>
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#"><?php echo $adminName['name']; ?></a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#" onclick="dashboard()">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="sale()">
                <span data-feather="map"></span>
                Sale Ads
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="rent()">
                <span data-feather="bookmark"></span>
                Rent Ads
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="hot()">
                <span data-feather="zap"></span>
                Hot Ads
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="superHot()">
                <span data-feather="feather"></span>
                SuperHot Ads
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="feature()">
                <span data-feather="award"></span>
                Feature Ads
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="chat()">
                <span data-feather="message-circle"></span>
                Chat
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="messages()">
                <span data-feather="message-square"></span>
                Messages
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="agents()">
                <span data-feather="users"></span>
                Agents
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="settings()">
                <span data-feather="settings"></span>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="logout()">
                <span data-feather="log-out"></span>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h3 class="h2">Dashboard</h3>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-dark" onclick="adProperty()">
              <span data-feather="plus"></span>
              Add Property
            </button>
          </div>
        </div>
        <div class="container mt-2 mb-3">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
              <div class="box box1">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="icon">
                      <span data-feather="clipboard"></span>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7">
                    <h6>Total Ads</h6>
                    <?php
                    $adCount = "SELECT COUNT(id) AS total FROM ads";
                    $runadCount = $conn->query($adCount);
                    $resultCount = mysqli_fetch_array($runadCount);
                    $adsCount = $resultCount['total'];
                    echo "<h4>" . $adsCount . "</h4>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
              <div class="box box2">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="icon">
                      <span data-feather="map"></span>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7">
                    <h6>Sale Ads</h6>
                    <?php
                    $saleAdCount = "SELECT COUNT(id) AS total FROM ads WHERE purpose = 'Sale'";
                    $runSaleAdCount = $conn->query($saleAdCount);
                    $resultSaleCount = mysqli_fetch_array($runSaleAdCount);
                    $saleAdsCount = $resultSaleCount['total'];
                    echo "<h4>" . $saleAdsCount . "</h4>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-3">
              <div class="box box3">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="icon">
                      <span data-feather="bookmark"></span>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7">
                    <h6>Rent Ads</h6>
                    <?php
                    $rentAdCount = "SELECT COUNT(id) AS total FROM ads WHERE purpose = 'Rent'";
                    $runRentAdCount = $conn->query($rentAdCount);
                    $resultRentCount = mysqli_fetch_array($runRentAdCount);
                    $rentAdsCount = $resultRentCount['total'];
                    echo "<h4>" . $rentAdsCount . "</h4>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-3">
              <div class="box box4">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="icon">
                      <span data-feather="coffee"></span>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7">
                    <h6>Hot & Super</h6>
                    <?php
                    $hotAdCount = "SELECT COUNT(id) AS total FROM ads WHERE status = '1' or status = '2'";
                    $runhotAdCount = $conn->query($hotAdCount);
                    $resulthotCount = mysqli_fetch_array($runhotAdCount);
                    $hotAdsCount = $resulthotCount['total'];
                    echo "<h4>" . $hotAdsCount . "</h4>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <canvas id="canvas" class="my-4 w-100" width="900" height="400"></canvas>
      </main>
    </div>
  </div>
  <!-- count total ads posting on monthly basis start -->
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-09-01' AND date <= '2020-09-30' and purpose='Sale'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cnt9 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-10-01' AND date <= '2020-10-31' and purpose='Sale'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cnt10 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-11-01' AND date <= '2020-11-30' and purpose='Sale'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cnt11 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-12-01' AND date <= '2020-12-31' and purpose='Sale'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cnt12 = $resultGraph6['total'];
  ?>

<?php
  $queryGraph1 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-01-01' AND date <= '2021-01-31' and purpose='Sale'";
  $runGraphQuery1 = $conn->query($queryGraph1);
  $resultGraph1 = mysqli_fetch_array($runGraphQuery1);
  $cnt1 = $resultGraph1['total'];
  ?>
  <?php
  $queryGraph2 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-02-01' AND date <= '2021-02-28' and purpose='Sale'";
  $runGraphQuery2 = $conn->query($queryGraph2);
  $resultGraph2 = mysqli_fetch_array($runGraphQuery2);
  $cnt2 = $resultGraph2['total'];
  ?>
  <?php
  $queryGraph3 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-03-01' AND date <= '2021-03-31' and purpose='Sale'";
  $runGraphQuery3 = $conn->query($queryGraph3);
  $resultGraph3 = mysqli_fetch_array($runGraphQuery3);
  $cnt3 = $resultGraph3['total'];
  ?>
  <?php
  $queryGraph4 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-04-01' AND date <= '2021-04-30' and purpose='Sale'";
  $runGraphQuery4 = $conn->query($queryGraph4);
  $resultGraph4 = mysqli_fetch_array($runGraphQuery4);
  $cnt4 = $resultGraph4['total'];
  ?>
  <?php
  $queryGraph5 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-05-01' AND date <= '2021-05-31' and purpose='Sale'";
  $runGraphQuery5 = $conn->query($queryGraph5);
  $resultGraph5 = mysqli_fetch_array($runGraphQuery5);
  $cnt5 = $resultGraph5['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-06-01' AND date <= '2021-06-30' and purpose='Sale'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cnt6 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-07-01' AND date <= '2021-07-31' and purpose='Sale'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cnt7 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-08-01' AND date <= '2021-08-31' and purpose='Sale'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cnt8 = $resultGraph6['total'];
  ?>
  <!-- rent count portion start -->
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-09-01' AND date <= '2020-09-30' and purpose='Rent'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cntRent9 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-10-01' AND date <= '2020-10-31' and purpose='Rent'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cntRent10 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-11-01' AND date <= '2020-11-30' and purpose='Rent'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cntRent11 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2020-12-01' AND date <= '2020-12-31' and purpose='Rent'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cntRent12 = $resultGraph6['total'];
  ?>
<?php
  $queryGraph1 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-01-01' AND date <= '2021-01-31' and purpose='Rent'";
  $runGraphQuery1 = $conn->query($queryGraph1);
  $resultGraph1 = mysqli_fetch_array($runGraphQuery1);
  $cntRent1 = $resultGraph1['total'];
  ?>
  <?php
  $queryGraph2 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-02-01' AND date <= '2021-02-28' and purpose='Rent'";
  $runGraphQuery2 = $conn->query($queryGraph2);
  $resultGraph2 = mysqli_fetch_array($runGraphQuery2);
  $cntRent2 = $resultGraph2['total'];
  ?>
  <?php
  $queryGraph3 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-03-01' AND date <= '2021-03-31' and purpose='Rent'";
  $runGraphQuery3 = $conn->query($queryGraph3);
  $resultGraph3 = mysqli_fetch_array($runGraphQuery3);
  $cntRent3 = $resultGraph3['total'];
  ?>
  <?php
  $queryGraph4 = "SELECT COUNT(id) AS total FROM ads WHERE date >= '2021-04-01' AND date <= '2021-04-30' and purpose='Rent'";
  $runGraphQuery4 = $conn->query($queryGraph4);
  $resultGraph4 = mysqli_fetch_array($runGraphQuery4);
  $cntRent4 = $resultGraph4['total'];
  ?>
  <?php
  $queryGraph5 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-05-01' AND date <= '2021-05-31' and purpose='Rent'";
  $runGraphQuery5 = $conn->query($queryGraph5);
  $resultGraph5 = mysqli_fetch_array($runGraphQuery5);
  $cntRent5 = $resultGraph5['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-06-01' AND date <= '2021-06-30' and purpose='Rent'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cntRent6 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-07-01' AND date <= '2021-07-31' and purpose='Rent'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cntRent7 = $resultGraph6['total'];
  ?>
  <?php
  $queryGraph6 = "SELECT COUNT(id) AS total FROM ads  WHERE date >= '2021-08-01' AND date <= '2021-08-31' and purpose='Rent'";
  $runGraphQuery6 = $conn->query($queryGraph6);
  $resultGraph6 = mysqli_fetch_array($runGraphQuery6);
  $cntRent8 = $resultGraph6['total'];
  ?>
  <!-- count total ads posting on monthly basis end -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery ||
      document.write(
        '<script src="bootstrap/js/jquery.min.js"><\/script>'
      );
  </script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/navigations.js"></script>
</body>
<!-- chats scripting -->
<script>
  var config = {
    type: 'line',
    data: {
      labels: ['September', 'October', 'November', 'December','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August'],
      datasets: [{
          label: 'Rent',
          backgroundColor: window.chartColors.green,
          borderColor: window.chartColors.green,
          data: [<?php echo $cntRent9; ?>, <?php echo $cntRent10; ?>, <?php echo $cntRent11; ?>, <?php echo $cntRent12; ?>,<?php echo $cntRent1; ?>, <?php echo $cntRent2; ?>, <?php echo $cntRent3; ?>, <?php echo $cntRent4; ?>, <?php echo $cntRent5; ?>, <?php echo $cntRent6; ?>, <?php echo $cntRent7; ?>, <?php echo $cntRent8; ?>],
        },
        {
          label: 'Sale',
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [<?php echo $cnt9; ?>, <?php echo $cnt10; ?>, <?php echo $cnt11; ?>, <?php echo $cnt12; ?>,<?php echo $cnt1; ?>, <?php echo $cnt2; ?>, <?php echo $cnt3; ?>, <?php echo $cnt4; ?>, <?php echo $cnt5; ?>, <?php echo $cnt6; ?>, <?php echo $cnt7; ?>, <?php echo $cnt8; ?>],
        },
      ]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Superhomes Dashboard'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Month'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };

  window.onload = function() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myLine = new Chart(ctx, config);
  };
</script>

</html>