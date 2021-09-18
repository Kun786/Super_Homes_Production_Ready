<?php require("connection.php");
session_start();
$id = $_REQUEST["id"];
$query = "SELECT * FROM ads WHERE id='$id'";
$fire = $conn->query($query);
$run = mysqli_fetch_array($fire);
$views = $run['views'];
$visitorIp = $_SERVER['REMOTE_ADDR'];
$addView = $views + 1;
$addVisitor = "UPDATE ads SET views='$addView' WHERE id = $id";
$fireCounter = $conn->query($addVisitor);
$images = $run['img'];
if ($images) {
	$img = 'uploads/' . $images;
} else {
	$img = "imgs/no-image.jpg";
}
$city = $run['city'];
$society = $run['society'];
$phase = $run['phase'];
$block = $run['block'];
$societyQuery = "SELECT * FROM socities WHERE id = '$society'";
$runsociety = $conn->query($societyQuery);
$societyName = mysqli_fetch_array($runsociety);
$phaseQuery = "SELECT * FROM phases WHERE id = '$phase'";
$firePhase = $conn->query($phaseQuery);
$phaseName = mysqli_fetch_array($firePhase);
$cityQuery = "SELECT * FROM cities WHERE id = '$city'";
$fireCity = $conn->query($cityQuery);
$cityName = mysqli_fetch_array($fireCity);
$blockQuery = "SELECT * FROM blocks WHERE id = '$block'";
$fireBlock = $conn->query($blockQuery);
$blockName = mysqli_fetch_array($fireBlock);
?>
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
	<style>
		.card,
		.list-group {
			border-radius: 0px !important;
		}
		.blockquote .list-group{
			font-size: 16px;
		}
		.card p {
			font-size: 15px;
		}

		.card img {
			width: 100%;
			height: 100%;
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
	<!-- content section start -->
	<div class="container mt-4">
		<div class="heading">
			<h4><?php echo $run['title']; ?></h4>
			<h5><?php echo $phaseName['name']?> <?php echo $blockName['name']?> <?php echo $societyName['name']?> <?php echo $cityName['name']?> Pakistan</h5>
		</div><br>
		<div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12 mb-2">
				<img src="<?php echo $img; ?>" class="img-fluid">
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="card text-center">
					<div class="card-header">
						Contact Details
					</div>
					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item"><?php echo $run['name']; ?></li>
							<li class="list-group-item"><?php echo $run['email']; ?></li>
							<li class="list-group-item"><?php echo $run['mobile1']; ?></li>
							<li class="list-group-item"><?php echo $run['mobile2']; ?></li>
						</ul><br>
						<ul class="list-group">
							<li class="list-group-item">Ad id : <?php echo $id ?></li>
							<li class="list-group-item">Posting : <?php echo $run['date']; ?></li>
						</ul>
					</div>
					<div class="card-footer text-muted">
						SuperHomes Real Estate
					</div>
				</div>
			</div>
		</div><br>
		<div class="row mb-4 mt-3">
			<div class="col">
				<div class="card">
					<div class="card-header">
						Details
					</div>
					<div class="card-body">
						<blockquote class="blockquote mb-0">
							<ul class="list-group list-group-horizontal-sm mb-2">
								<li class="list-group-item">Area : <?php echo $run['area']; ?><?php echo $run['areaUnit']; ?></li>
								<li class="list-group-item">Beds : <?php echo $run['beds']; ?></li>
								<li class="list-group-item">Baths : <?php echo $run['baths']; ?></li>
								<li class="list-group-item">Parking : <?php echo $run['parking']; ?></li>
								<li class="list-group-item">Kitchens : <?php echo $run['kitchen']; ?></li>
								<li class="list-group-item">Servant Quarter : <?php echo $run['servantQuerter']; ?></li>
								<li class="list-group-item">Furnished : <?php echo $run['furnished']; ?></li>
							</ul>
							<p class="text-justify"><?php echo $run['description']; ?></p>
							<div class="blockquote-footer">SuperHomes <cite title="Source Title">Real Estate</cite></div>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content section end -->
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