<?php require("connection.php");
session_start();
if (!isset($_SESSION["email"])) {
	header("location:login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Ad Posting</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/d6fb912aa0.js"></script>
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
		.posting_container {

			padding: 10px;
		}

		hr {
			border-bottom: 2px solid white;
		}

		.purposeBox button {
			border-radius: 0px;
			border: 1px solid black;
		}

		.activeForm {
			background: black;
			color: white;
		}

		.submitButton {
			width: 250px;
		}

		input,
		button,
		textarea,
		select {
			border-radius: 0px !important;
		}
	</style>
</head>

<body>
	<div class="posting_container">
		<div class="purposeBox text-center mb-5 mt-3">
			<div class="btn-group" role="group" aria-label="Basic example">
				<button type="button" class="btn btn-light activeForm" id="rent">Rent</button>
				<button type="button" class="btn btn-light" id="sale">Sale</button>
			</div>
		</div>
		<hr>
		<div class="container">
			<form id="rentForm" method="post">
				<?php
				if (isset($_POST['submit'])) {
					$purpose = "Rent";
					$type = $_POST['type'];
					$city = $_POST['city'];
					$society = $_POST['society'];
					$phase = $_POST['phase'];
					$block = $_POST['block'];
					$title = $_POST['title'];
					$description = $_POST['description'];
					$price = $_POST['price'];
					$area = $_POST['area'];
					$areaUnit = $_POST['areaUnit'];
					$beds = $_POST['beds'];
					$baths = $_POST['baths'];
					$parking = $_POST['parking'];
					$kitchen = $_POST['kitchen'];
					$sQuarter = $_POST['sQuarter'];
					$furnished = $_POST['furnished'];
					$img = $_POST['file'];
					$name = $_POST['name'];
					$mobile1 = $_POST['mobile1'];
					$mobile2 = $_POST['mobile2'];
					$email = $_POST['email'];
					$status = '0';
					$view = '0';
					$rentQuery = "INSERT INTO ads(purpose,type,city,society,phase,block,title,description,price,area,areaUnit,beds,baths,parking,kitchen,servantQuerter,furnished,img,name,mobile1,mobile2,email,status,views)VALUES('$purpose','$type','$city','$society','$phase','$block','$title','$description','$price','$area','$areaUnit','$beds','$baths','$parking','$kitchen','$sQuarter','$furnished','$img','$name','$mobile1','$mobile2','$email','$status','$view')";
					$fireRentQuery = $conn->query($rentQuery);
					if ($fireRentQuery) {
						echo "<div class='alert alert-success'>Ad Post Successfully!</div>";
					} else {
						echo "<div class='alert alert-danger'>Ad Posting Failed!</div>";
					}
				}
				?>
				<div class="form-row">
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="type">Property Type<sup>*</sup></label>
							<select name="type" class="form-control form-control-dark" required>
								<option>Full House</option>
								<option>Upper Portion</option>
								<option>Lower Portion</option>
								<option>Commercial</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="city">City<sup>*</sup></label>
							<select name="city" id="city" class="form-control form-control-dark" required>
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
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="society">Society<sup>*</sup></label>
							<select name="society" id="society" class="form-control form-control-dark" required>
								<option>Select Society</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="phase">Phase<sup>*</sup></label>
							<select name="phase" id="phase" class="form-control form-control-dark" required>
								<option>Phase</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="block">Block<sup>*</sup></label>
							<select name="block" id="block" class="form-control form-control-dark" required>
								<option>Block</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<label>Title<sup>*</sup></label>
							<input type="text" name="title" autocomplete="off" placeholder="Title..." class="form-control form-control-dark" required>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<label>Description<sup>*</sup></label>
							<textarea class="form-control form-control-dark" name="description" autocomplete="off" rows="5" cols="15" placeholder="Description..." required></textarea>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-4">
						<div class="form-group">
							<label for="price">Price<sup>*</sup></label>
							<input type="text" name="price" placeholder="PKR1,000,000" class="form-control form-control-dark" required>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="price">Area<sup>*</sup></label>
							<input type="number" name="area" autocomplete="off" placeholder="Area..." class="form-control form-control-dark" required>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="price">Area Unit<sup>*</sup></label>
							<select class="form-control form-control-dark" name="areaUnit" required>
								<option>Marla</option>
								<option>Kanal</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-2 col-sm-6 col-md-6">
						<div class="form-group">
							<label>Bedroom's<sup>*</sup></label>
							<input type="number" name="beds" class="form-control form-control-dark" placeholder="Bedrooms." required>
						</div>
					</div>
					<div class="col-lg-2 col-sm-6 col-md-6">
						<div class="form-group">
							<label>Bathroom's<sup>*</sup></label>
							<input type="number" name="baths" class="form-control form-control-dark" placeholder="Bathrooms." required>
						</div>
					</div>
					<div class="col-lg-2 col-sm-6 col-md-6">
						<div class="form-group">
							<label>Car Parking</label>
							<input type="number" name="parking" class="form-control form-control-dark" placeholder="Parking">
						</div>
					</div>
					<div class="col-lg-2 col-sm-6 col-md-6">
						<div class="form-group">
							<label>Kitchen's</label>
							<input type="number" name="kitchen" class="form-control form-control-dark" placeholder="Kitchens">
						</div>
					</div>
					<div class="col-lg-2 col-sm-6 col-md-6">
						<div class="form-group">
							<label>Servant Quarter</label>
							<select class="form-control form-control-dark" name="sQuarter">
								<option>No</option>
								<option>Yes</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-sm-6 col-md-6">
						<div class="form-group">
							<label>Furnished</label>
							<select class="form-control form-control-dark" name="furnished">
								<option>No</option>
								<option>Yes</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<label>Images</label>
							<input type="file" name="file" class="form-control form-control-dark">
						</div>
					</div>
				</div>
				<div class="form-row mb-2">
					<?php
					$email = $_SESSION['email'];
					$nameQuery = "SELECT * FROM admin WHERE email='$email'";
					$runName = $conn->query($nameQuery);
					$adminData = mysqli_fetch_array($runName);
					?>
					<div class="col-2 text-center"><label>Name<sup>*</sup></label></div>
					<div class="col"><input type="text" name="name" class="form-control form-control-dark" placeholder="Name" value="<?php echo $adminData['name'] ?>"></div>
				</div>
				<div class="form-row mb-2">
					<div class="col-2 text-center"><label>Mobile 1</label></div>
					<div class="col"><input type="number" name="mobile1" class="form-control form-control-dark" placeholder="Mobile 1" value="<?php echo $adminData['mobile'] ?>"></div>
				</div>
				<div class="form-row mb-2">
					<div class="col-2 text-center"><label>Mobile 2</label></div>
					<div class="col"><input type="number" name="mobile2" class="form-control form-control-dark" placeholder="Mobile 2"></div>
				</div>
				<div class="form-row mb-2">
					<div class="col-2 text-center"><label>Email<sup>*</sup></label></div>
					<div class="col"><input type="text" name="email" class="form-control form-control-dark" placeholder="Email..." value="<?php echo $adminData['email'] ?>"></div>
				</div>
				<div class="form-row mt-3">
					<div class="col text-right">
						<button class="btn btn-outline-dark submitButton" name="submit" type="submit">Submit Property</button>
					</div>
				</div>
			</form>
			<form id="saleForm" method="post">
			<?php
					if (isset($_POST['submitSale'])) {
						$purpose = "Sale";
						$type = $_POST['type'];
						$city = $_POST['city'];
						$society = $_POST['society'];
						$phase = $_POST['phase'];
						$block = $_POST['block'];
						$title = $_POST['title'];
						$description = $_POST['description'];
						$price = $_POST['price'];
						$area = $_POST['area'];
						$areaUnit = $_POST['areaUnit'];
						$beds = '';
						$baths = '';
						$parking = '';
						$kitchen = '';
						$sQuarter = '';
						$furnished = '';
						$img = $_POST['file'];
						$name = $_POST['name'];
						$mobile1 = $_POST['mobile1'];
						$mobile2 = $_POST['mobile2'];
						$email = $_POST['email'];
						$status = '0';
						$view = '0';
						$rentQuery = "INSERT INTO ads(purpose,type,city,society,phase,block,title,description,price,area,areaUnit,beds,baths,parking,kitchen,servantQuerter,furnished,img,name,mobile1,mobile2,email,status,views)VALUES('$purpose','$type','$city','$society','$phase','$block','$title','$description','$price','$area','$areaUnit','$beds','$baths','$parking','$kitchen','$sQuarter','$furnished','$img','$name','$mobile1','$mobile2','$email','$status','$view')";
						$fireRentQuery = $conn->query($rentQuery);
						if ($fireRentQuery) {
							echo "<div class='alert alert-success'>Ad Post Successfully!</div>";
						} else {
							echo "<div class='alert alert-danger'>Ad Posting Failed!</div>";
						}
					}
					?>
				<div class="form-row">
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="type">Property Type<sup>*</sup></label>
							<select name="type" class="form-control form-control-dark" required>
								<option>House</option>
								<option>Commercial Building</option>
								<option>Residentional Plot</option>
								<option>Commercial Plot</option>
								<option>Form House</option>
								<option>Agriculture Land</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="city">City<sup>*</sup></label>
							<select name="city" id="city2" class="form-control form-control-dark" required>
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
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="society">Society<sup>*</sup></label>
							<select name="society" id="society2" class="form-control form-control-dark" required>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="phase">Phase<sup>*</sup></label>
							<select name="phase" id="phase2" class="form-control form-control-dark" required>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="form-group">
							<label for="block">Block<sup>*</sup></label>
							<select name="block" id="block2" class="form-control form-control-dark" required>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<label>Title<sup>*</sup></label>
							<input type="text" name="title" autocomplete="off" placeholder="Title..." class="form-control form-control-dark" required>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<label>Description<sup>*</sup></label>
							<textarea class="form-control form-control-dark" name="description" rows="5" autocomplete="off" cols="15" placeholder="Description..." required></textarea>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-4">
						<div class="form-group">
							<label for="price">Price<sup>*</sup></label>
							<input type="text" name="price" autocomplete="off" placeholder="1000000" class="form-control form-control-dark" required>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="price">Area<sup>*</sup></label>
							<input type="number" name="area" autocomplete="off" placeholder="Area..." class="form-control form-control-dark" required>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="price">Area Unit<sup>*</sup></label>
							<select class="form-control form-control-dark" name="areaUnit" required>
								<option>Marla</option>
								<option>Kanal</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<label>Images</label>
							<input type="file" name="file" class="form-control form-control-dark">
						</div>
					</div>
				</div>
				<div class="form-row mb-2">
				<?php
					$email = $_SESSION['email'];
					$nameQuery = "SELECT * FROM admin WHERE email='$email'";
					$runName = $conn->query($nameQuery);
					$adminData = mysqli_fetch_array($runName);
					?>
					<div class="col-2 text-center"><label>Name<sup>*</sup></label></div>
					<div class="col"><input type="text" name="name" class="form-control form-control-dark" placeholder="Name" value="<?php echo $adminData['name'] ?>"></div>
				</div>
				<div class="form-row mb-2">
					<div class="col-2 text-center"><label>Mobile 1<sup>*</sup></label></div>
					<div class="col"><input type="number" name="mobile1" class="form-control form-control-dark" placeholder="Mobile 1" value="<?php echo $adminData['mobile'] ?>"></div>
				</div>
				<div class="form-row mb-2">
					<div class="col-2 text-center"><label>Mobile 2</label></div>
					<div class="col"><input type="number" name="mobile2" class="form-control form-control-dark" placeholder="Mobile 2"></div>
				</div>
				<div class="form-row mb-2">
					<div class="col-2 text-center"><label>Email<sup>*</sup></label></div>
					<div class="col"><input type="text" name="email" class="form-control form-control-dark" placeholder="Email..." value="<?php echo $adminData['email'] ?>"></div>
				</div>
				<div class="form-row mt-3">
					<div class="col text-right">
						<button class="btn btn-outline-dark submitButton" name="submitSale" type="submit">Submit Property</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script>
	$(document).ready(function() {
		$('#rent').click(function() {
			$('#saleForm').hide();
			$('#rentForm').show();
			$("#sale").removeClass("activeForm");
			$("#rent").addClass("activeForm");
		});
	});

	$('#saleForm').hide();
	$('#sale').click(function() {
		$('#saleForm').show();
		$('#rentForm').hide();
		$("#rent").removeClass("activeForm");
		$("#sale").addClass("activeForm");
	});

	// currency code
	$("input[data-type='currency']").on({
		keyup: function() {
			formatCurrency($(this));
		},
		blur: function() {
			formatCurrency($(this), "blur");
		}
	});


	function formatNumber(n) {
		// format number 1000000 to 1,234,567
		return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	}


	function formatCurrency(input, blur) {
		// appends $ to value, validates decimal side
		// and puts cursor back in right position.

		// get input value
		var input_val = input.val();

		// don't validate empty input
		if (input_val === "") {
			return;
		}

		// original length
		var original_len = input_val.length;

		// initial caret position 
		var caret_pos = input.prop("selectionStart");

		// check for decimal
		if (input_val.indexOf(".") >= 0) {

			// get position of first decimal
			// this prevents multiple decimals form
			// being entered
			var decimal_pos = input_val.indexOf(".");

			// split number by decimal point
			var left_side = input_val.substring(0, decimal_pos);
			var right_side = input_val.substring(decimal_pos);

			// add commas to left side of number
			left_side = formatNumber(left_side);

			// validate right side
			right_side = formatNumber(right_side);

			// On blur make sure 2 numbers after decimal
			if (blur === "blur") {
				right_side += "00";
			}

			// Limit decimal to only 2 digits
			right_side = right_side.substring(0, 2);

			// join number by .
			input_val = "PKR " + left_side + "." + right_side;

		} else {
			// no decimal entered
			// add commas to number
			// remove all non-digits
			input_val = formatNumber(input_val);
			input_val = "PKR " + input_val;

			// final formatting
			if (blur === "blur") {
				input_val += ".00";
			}
		}

		// send updated string to input
		input.val(input_val);

		// put caret back in the right position
		var updated_len = input_val.length;
		caret_pos = updated_len - original_len + caret_pos;
		input[0].setSelectionRange(caret_pos, caret_pos);
	}
</script>

</html>