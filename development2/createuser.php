<?php

// establishing the MySQLi connection

$servername = "46.21.173.249";
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbname = "bjorngv155_Craved";

$con = mysqli_connect($servername,$username,$password,$dbname);


// checking the user

if(isset($_POST['signup'] )){

$email = mysqli_real_escape_string($con,$_POST['email']);
$user = mysqli_real_escape_string($con,$_POST['user']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
$pass2 = mysqli_real_escape_string($con,$_POST['pass2']);
$voornaam = mysqli_real_escape_string($con,$_POST['voornaam']);
$achternaam = mysqli_real_escape_string($con,$_POST['achternaam']);
$telefoon = mysqli_real_escape_string($con,$_POST['telefoon']);
$geslacht = mysqli_real_escape_string($con,$_POST['geslacht']);
$accepted = $_POST['accept'];


	$userlower = strtolower($user);
	$voornaam = ucwords(strtolower($voornaam));
	$achternaam = ucwords(strtolower($achternaam));
	
	
	if($accepted == '1'){
		
	
	$check_user = "select * from user_logon where user_login_naam='$userlower'";
	$check_email = "select * from users where user_email='$email'";
	
	$run_user = mysqli_query($con, $check_user);
	$run_email = mysqli_query($con, $check_email);
	if(mysqli_num_rows($run_user)>0){
		$error = "User bestaat al!";
	}elseif (mysqli_num_rows($run_email)>0){
		$error = "Email adres wordt al gebruikt!";
	}else{
		
		if($pass === $pass2){
			if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
				$encrypted = crypt($pass);
				$insert_userlogon = "insert into user_logon (user_login_naam, user_wachtwoord) values ('$userlower','$encrypted')";
				$insert_user = "insert into users (user_voornaam, user_achternaam, user_telefoonnummer, user_geslacht, user_email) values ('$voornaam','$achternaam','$telefoon','$geslacht','$email')";
				$run_userlogon = mysqli_query($con, $insert_userlogon);
				$run_user = mysqli_query($con, $insert_user);
				header("location: login.php");
			}else{
				$error = "Fout ingegeven email.";
			}
		}else{
			$error = "De wachtwoorden zijn niet hetzelfde";
		}
		
	}
}else{
	$error = "U heeft niet overeengestemd met de gebruiksvoorwaarden.";
}
}
	
	




?>