<?php
session_start();
include('session.php');
include('assets/php/Functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Craved - Explore new flavours</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/cravedCustom.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<script type="text/javascript">
		function updateRangeOutput(val) {
			document.getElementById('rangeOutput').innerHTML = "<strong>"+ val + " km </strong>";
			rad = val * 1000;
		};

		function updateBudgetOutput(val){
			if(val == 1){
				document.getElementById('budgetOutput').innerHTML = "<strong>€</strong>";
			}else if(val == 2){
				document.getElementById('budgetOutput').innerHTML = "<strong>€€</strong>";
			}else{
				document.getElementById('budgetOutput').innerHTML = "<strong>€€€</strong>";
			}
		};


	</script>
</head>
<body class="is-loading-0 is-loading-1 is-loading-2">
<div id="logoBar">
	<img src="images/craved-icon.png" height="80">
</div>
<?php
// define variables and set to empty values
$rangeRangeErr = $butgetRangeErr = "";
$rangeRange = $budgetRange =  "2";
$budgetRangeOutp = "€€";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["rangeRange"])){
		$rangeRangeErr = "Stel een filter in";
	}else{
		$rangeRange = test_input($_POST["rangeRange"]);
	}

	if (empty($_POST["budgetRange"])){
		$budgetRangeErr = "Stel je budget in";
	}else{
		$budgetRange = test_input($_POST["budgetRange"]);
		if ($budgetRange == "1"){
			$budgetRangeOutp = "€";
		} elseif ($budgetRange == "2"){
			$budgetRangeOutp = "€€";
		} else {
			$budgetRangeOutp = "€€€";
		}
	}
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<!-- Main -->


<div id="main">

	<!-- Header -->
	<header id="header">
		<ul class="nav nav-pills nav-justified">
			<li class="active"><a data-toggle="pill" class="custompill" href="#menu0">Account</a></li>
			<li><a data-toggle="pill" class="custompill" href="#menu1">Filters</a></li>
			</br>
			<li><a data-toggle="pill" class="custompill" href="#menu2">Upload</a></li>
			<li><a data-toggle="pill" class="custompill" href="#menu3">Help</a></li>
		</ul>

		<div class="tab-content">
			<div id="menu0" class="tab-pane fade in active">
				<h3>Account</h3>
				<b id="welcome">Welkom: <i><?php echo $session_user; ?></i></b>
				<b id="logout"><a href="logout.php">Log Out</a></b>
			</div>
			<div id="menu1" class="tab-pane fade">
				<h3>Filters</h3>

				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<span style="color:#F39200";>Range:</span>	<span id="rangeOutput" class="rangeOutputDiv"><strong><?php echo $rangeRange;?> km</strong></span>
					<br><input type="range" name="rangeRange" min="0.1" max="5" step="0.1" value="<?php echo $rangeRange;?>" onchange="updateRangeOutput(this.value);">
					<br><span style="color:#F39200";>Butget:</span> <span id="budgetOutput" class="rangeOutputDiv"><strong><?php echo $budgetRangeOutp;?></strong></span>
					<br><input type="range" name="budgetRange" min="1" max="3" step="1" value="<?php echo $budgetRange;?>" onchange="updateBudgetOutput(this.value);">
					<h1><button type="submit" style="font-size:25px;">Filteren</button></h1>
				</form>
			</div>
			<div id="menu2" class="tab-pane fade">
				<h3>Upload</h3>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<label>Select image to upload:</label>
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="submit" value="Upload Image" name="upload">
				</form>
			</div>
			<div id="menu3" class="tab-pane fade">
				<h3>Help</h3>
				<p>
					<label name="onderwerp">Onderwerp</label>
				<form id="contactForm" method="post" action="mail/Contact.php">
					<input type="text" name="onderwerp"/>


					<label name="bericht">Bericht</label>
					<input type="textarea" name="bericht"/>

					<h1> <button type="submit">Send</button></h1>
				</form></p>
			</div>

		</div>
		<!-- Thumbnail -->
		<section id="thumbnails">
			<?php
			include 'assets/php/productLijst.php';
			?>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<ul class="copyright">
				<li>&copy; Craved Official 2016.
				</li></a></li>
			</ul>
		</footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>