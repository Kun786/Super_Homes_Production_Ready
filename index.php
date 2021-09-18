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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/featureCard.css">
  <link rel="stylesheet" href="css/timeline.css">
  <script>
    var from = null,
      start = 0,
      url = 'http://localhost/superhomes/chatAction.php';
    $(document).ready(function() {
      from = 'Client';
      load();

      $('form').submit(function(e) {
        $.post(url, {
          message: $('#message').val(),
          from: from
        });
        $('#message').val('');
        return false;
      });
    });

    function load() {
      $.get(url + '?start=' + start, function(result) {
        if (result.items) {
          result.items.forEach(item => {
            start = item.id;
            $('#messages').append(renderMessage(item));
          });
          $('#messages').animate({
            scrollTop: $('#messages')[0].scrollHeight
          });
        };
        load();
      });
    }

    function renderMessage(item) {
      let time = new Date(item.created);
      time = `${time.getHours()}:${time.getMinutes() < 10 ? '0' : '' }${time.getMinutes()}`;
      return `<div class="msg"><p>${item.msgFrom}</p>${item.message}<span>${time}</span></div>`;
    }
  </script>
  <script>
    console.log('hi');
    $(document).ready(function() {
      $('#city').on('change', function() {
        var cityId = $(this).val();
        console.log(cityId);
        $.ajax({
          method: "POST",
          url: "ajax.php",
          data: {
            id: cityId
          },
          dataType: "html",
          success: function(data) {
            $("#society").html(data);
          }
        });
      });

      $('#society').on('change', function() {
        var societyId = $(this).val();
        console.log(societyId);
        $.ajax({
          method: "POST",
          url: "ajax.php",
          data: {
            sId: societyId
          },
          dataType: "html",
          success: function(data) {
            $("#phase").html(data);
          }
        });
      });

      $('#phase').on('change', function() {
        var phaseId = $(this).val();
        console.log(phaseId);
        $.ajax({
          method: "POST",
          url: "ajax.php",
          data: {
            pId: phaseId
          },
          dataType: "html",
          success: function(data) {
            $("#block").html(data);
          }
        });
      });
      // form 2 code start

      $('#city2').on('change', function() {
        var cityId = $(this).val();
        console.log(cityId);
        $.ajax({
          method: "POST",
          url: "ajax.php",
          data: {
            id: cityId
          },
          dataType: "html",
          success: function(data) {
            $("#society2").html(data);
          }
        });
      });

      $('#society2').on('change', function() {
        var societyId = $(this).val();
        console.log(societyId);
        $.ajax({
          method: "POST",
          url: "ajax.php",
          data: {
            sId: societyId
          },
          dataType: "html",
          success: function(data) {
            $("#phase2").html(data);
          }
        });
      });

      $('#phase2').on('change', function() {
        var phaseId = $(this).val();
        console.log(phaseId);
        $.ajax({
          method: "POST",
          url: "ajax.php",
          data: {
            pId: phaseId
          },
          dataType: "html",
          success: function(data) {
            $("#block2").html(data);
          }
        });
      });

    });
  </script>
  <style>
    .btn-chat {
      border: none;
      text-transform: uppercase;
      font-size: 20px;
      position: fixed;
      bottom: 0;
      right: 0;
      width: 50px;
      padding: 10px;
      border-radius: 0px;
    }

    #chatBox {
      display: none;
      border: 3px solid #f1f1f1;
      position: fixed;
      bottom: 0px;
      right: 0px;
      z-index: 9;
      width: 350px;
      height: 450px;
      overflow: hidden;
    }

    .card {
      width: 100%;
      border-radius: 0px;
    }

    #messages {
      height: 40vh;
      overflow-x: hidden;
      padding: 10px;
      margin-left: -15px;
    }

    .card form {
      display: flex;
    }

    .card input {
      font-size: 1.2rem;
      padding: 10px;
      margin-top: 3px;
      margin-bottom: 5px;
      appearance: none;
      -webkit-appearance: none;
      border: 1px solid #000;
      border-radius: 0px;
    }

    #message {
      flex: 2;
    }

    .msg {
      background-color: #dcf8c6;
      padding: 5px 10px;
      border-radius: 5px;
      margin-bottom: 8px;
      width: fit-content;
    }

    .msg p {
      margin: 0;
      font-weight: bold;
    }

    .msg span {
      font-size: 0.7rem;
      margin-left: 15px;
    }
    .button-link{
      width: 150px;
      margin-top: 4px;
      border-radius: 0px;
    }
  </style>
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
      <a class="navbar-brand" href="#">SuperHomes</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
          <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Login">
            <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- main header end -->
  <!-- after header section start -->
  <div class="slider">
    <div class="searchBox">
      <div class="purposeBox">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-light activeForm" id="rent">Rent</button>
          <button type="button" class="btn btn-light" id="sale">Sale</button>
        </div>
      </div>
      <div class="container">
        <form class="form rent" action="search.php">
          <div class="form-row">
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="city" name="city" class="form-control">
                <option value="">Select City</option>
                <?php
                $query = "SELECT * FROM cities";
                $fire = $conn->query($query);
                while ($row = mysqli_fetch_array($fire)) {
                ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="society" name="society" class="form-control">
                <option>Society</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="phase" name="phase" class="form-control">
                <option selected>Phase</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="block" name="block" class="form-control">
                <option selected>Block</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="inputState" class="form-control">
                <option>Upper Portion</option>
                <option>Lower Portion</option>
                <option selected>Full House</option>
                <option>Commercial</option>
              </select>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-12">
              <select id="inputState" class="form-control">
                <option selected>Area</option>
                <option>2 Marla</option>
                <option>4 Marla</option>
                <option>5 Marla</option>
                <option>8 Marla</option>
                <option>10 Marla</option>
                <option>1 Kanal</option>
                <option>2 Kanal</option>
              </select>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-12">
              <button class="btn btn-outline-light btn-block">Find</button>
            </div>
          </div>
        </form>
        <form class="form sale" action="search.php">
          <div class="form-row">
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="city2" name="city" class="form-control">
                <option value="">Select City</option>
                <?php
                $query = "SELECT * FROM cities";
                $fire = $conn->query($query);
                while ($row = mysqli_fetch_array($fire)) {
                ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="society2" name="society" class="form-control">
                <option selected>Society</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="phase2" name="phase" class="form-control">
                <option selected>Phase</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="block2" name="block" class="form-control">
                <option selected>Block</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <select id="inputState" class="form-control">
                <option selected>Area</option>
                <option>2 Marla</option>
                <option>4 Marla</option>
                <option>5 Marla</option>
                <option>8 Marla</option>
                <option>10 Marla</option>
                <option>1 Kanal</option>
                <option>2 Kanal</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <button class="btn btn-outline-light btn-block">Find</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- after header section end -->
  <!-- feature properties section -->
  <div class="container-fluid mt-5 mb-5">
    <h3 class="text-center mb-5">Feature Properties</h3>
    <div class="container">
      <div class="row">
        <?php
        $dataQuery = "SELECT * FROM ads WHERE feature = '1' ORDER BY Id DESC";
        $runQuery = $conn->query($dataQuery);
        while ($data = mysqli_fetch_array($runQuery)) {
          $images = $data['img'];
          if ($images) {
            $img = 'uploads/' . $images;
          } else {
            $img = "imgs/no-image.jpg";
          }
          $id = $data['id'];
          $price = $data['price'];
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
          <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-center justify-content-center mb-4">
            <div class="cardBox card">
              <img src="<?php echo $img; ?>" class="img-fluid">
              <div class="feature">Feature</div>
              <div class="content">
                <h6 class="text-center"><?php echo $societyName['name'] ?> <?php echo $phaseName['name'] ?> <?php echo $blockName['name'] ?></h6>
                <h6 class="text-center" style="font-size: 14px;"><span class=" text-center mr-2">PKR <?php echo $price ?></span> <span class="text-center ml-2"><?php echo $data['area']; ?> <?php echo $data['areaUnit']; ?></span></h6>
                <p class="text-center"><?php echo $data['title']; ?><p>                
                <p class="text-center"><a href="viewAd.php?id=<?php echo $id; ?>" class="btn btn-outline-dark button-link text-center">View</a></p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- feature properties section end -->
  <!-- superhomes section start -->
  <div class="shome">
    <div class="sHomeBox text-center">
      <h1 class="text-light mb-3">SuperHomes Real Estate</h1>
      <p class="text-light"><sup><i class="fas fa-quote-left"></i></sup> The House you looked at today and wanted to
        think about until tomorrow <br>may be the same house someone looked at yesterday and will buy today. <sub><i class="fas fa-quote-right"></i></sub></p>
    </div>
  </div>
  <!-- superhomes section end -->
  <!-- work section start -->
  <div class="work mb-3 mt-5">
    <h3 class="text-center mb-5">Achievements</h3><br><br><br>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="main-timeline">
            <div class="timeline">
              <i class="fa fa-globe"></i>
              <a href="#" class="timeline-content c1">
                <h4 class="title">Available Properties</h4>
                <ul class="text-right">
                  <li><strong>8k</strong><sup>+</sup> Homes</li>
                  <li><strong>12k</strong><sup>+</sup> Plots</li>
                  <li><strong>4k</strong><sup>+</sup> Commercial</li>
                </ul>
              </a>
            </div>
            <div class="timeline">
              <i class="fa fa-globe"></i>
              <a href="#" class="timeline-content c2">
                <h4>Sold Properties</h4>
                <ul class="text-right">
                  <li><strong>5k</strong><sup>+</sup> Homes</li>
                  <li><strong>10k</strong><sup>+</sup> Plots</li>
                  <li><strong>1k</strong><sup>+</sup> Commercial</li>
                </ul>
              </a>
            </div>
            <div class="timeline">
              <i class="fa fa-globe"></i>
              <a href="#" class="timeline-content c3">
                <h4>Upcoming Projects</h4>
                <ul class="text-right">
                  <li><strong>200</strong><sup>+</sup> Homes</li>
                  <li><strong> 100</strong><sup>+</sup> Commercial</li>
                </ul>
              </a>
            </div>
            <div class="timeline">
              <i class="fa fa-globe"></i>
              <a href="#" class="timeline-content c4">
                <h4>Happy Clients</h4>
                <h5 class="text-right">2k<sup>+</sup></h5>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- work section end -->
  <!-- get in touch section start -->
  <div class="contact">
    <h3 class="text-center mb-5">Get in Touch</h3>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7 d-flex justify-content-center align-items-center">
          <div class="form">
            <form>
              <div class="form-group">
                <input type="text" name="name" placeholder="Name" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="number" name="mobile" placeholder="Mobile Number" required>
              </div>
              <div class="form-group">
                <textarea cols="10" rows="6" placeholder="Your message..." required></textarea>
              </div>
              <div class="form-group text-right">
                <button class="btn btn-light">Send <i class="fab fa-telegram-plane"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="col"><br><br>
          <ul>
            <li><i class="fas fa-mobile"></i> +923314097772</li>
            <li><i class="fab fa-whatsapp"></i> +923214097772</li>
            <li><i class="far fa-envelope"></i> superhomesrealestateandbuilders@gmail.com</li>
            <li><i class="fas fa-map-marker-alt"></i> 1st Floor 68-G Phase 1 DHA Lahore Cantt</li>
          </ul>
          <hr>
          <div class="social">
            <ul>
              <li><a href="#" class="text-light"><i class="fab fa-facebook fa-2x"></i></a></li>
              <li><a href="#" class="text-light"><i class="fab fa-twitter fa-2x"></i></a></li>
              <li><a href="#" class="text-light"><i class="fab fa-instagram fa-2x"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row map">
        <div class="col d-flex justify-content-center">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1701.241608283531!2d74.39468020674593!3d31.48339919170898!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x29aae2de4d3e6ba!2sSuper%20Homes%20Real%20Estate%20%26%20Builder&#39;s!5e0!3m2!1sen!2s!4v1598799953771!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </div>
  <!-- get in touch section end -->
  <!-- chat box section start -->
  <div class="container">
    <button type="button" class="btn btn-dark btn-chat" onclick="openChat()"><i class="fas fa-comment-alt"></i></button>
    <div class="chatBox" id="chatBox">
      <div class="card">
        <div class="card-header bg-dark text-light text-center">
          <h4>Chat</h4>
        </div>
        <div class="card-body">
          <div id="messages"></div>
        </div>
        <div class="card-footer text-muted">
          <form>
            <input type="text" id="message" autocomplete="off" autofocus placeholder="type message...">
            <input type="submit" value="Send">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- chat box section end -->
  <!-- footer section start -->
  <footer class="text-center">
    Copyright Superhomes | All Rights Reserved
  </footer>
  <!-- footer section end -->
</body>
<script>
  $(document).ready(function() {
    $('.sale').hide();
    $('#rent').click(function() {
      $('.sale').hide();
      $('.rent').show();
      $("#sale").removeClass("activeForm");
      $("#rent").addClass("activeForm");
    });
    $('#sale').click(function() {
      $('.sale').show();
      $('.rent').hide();
      $("#rent").removeClass("activeForm");
      $("#sale").addClass("activeForm");
    });
  });
</script>
<script>
  function openChat() {
    document.getElementById('chatBox').style.display = 'block';
    $('.btn-chat').hide();
  }

  function closeChat() {
    document.getElementById('chatBox').style.display = 'none';
    $('.btn-chat').show();
  }
</script>

</html>