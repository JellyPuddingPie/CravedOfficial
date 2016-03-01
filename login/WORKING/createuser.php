<?php

// establishing the MySQLi connection

$servername = "46.21.173.249";
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbname = "bjorngv155_Craved";

$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())

{

echo "MySQLi Connection was not established: " . mysqli_connect_error();

}

// checking the user

if(isset($_POST['signup'])){

$email = mysqli_real_escape_string($con,$_POST['email']);
$user = mysqli_real_escape_string($con,$_POST['user']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
$pass2 = mysqli_real_escape_string($con,$_POST['pass2']);
$voornaam = mysqli_real_escape_string($con,$_POST['voornaam']);
$achternaam = mysqli_real_escape_string($con,$_POST['achternaam']);
$telefoon = mysqli_real_escape_string($con,$_POST['telefoon']);
$geslacht = mysqli_real_escape_string($con,$_POST['geslacht']);
		
	$check_user = "select * from user_logon where user_login_naam='$user'";
	
	$run_check = mysqli_query($con, $check_user);
	echo "count" . mysqli_num_rows($run_check);
	if(mysqli_num_rows($run_check)>0){
		echo "User bestaat al!";
		ob_end_flush();
		flush();
		usleep(25000);
		echo "<script>window.open('signup.php','_self')</script>";
	}else{
		if($pass === $pass2){
			if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
				$encrypted = crypt($pass);
				$insert_userlogon = "insert into user_logon (user_login_naam, user_wachtwoord) values ('$user','$encrypted')";
				$insert_user = "insert into users (user_voornaam, user_achternaam, user_telefoonnummer, user_geslacht, user_email) values ('$voornaam','$achternaam','$telefoon','$geslacht','$email')";
				$run_userlogon = mysqli_query($con, $insert_userlogon);
				$run_user = mysqli_query($con, $insert_user);
				echo "<script>window.open('index.html','_self')</script>";
			}else{
				echo "Fout ingegeven email.";
				ob_end_flush();
				flush();
				usleep(25000);
				echo "<script>window.open('signup.php','_self')</script>";
			}
		}else{
			echo "De wachtwoorden zijn niet hetzelfde";
			ob_end_flush();
			flush();
			usleep(25000);
			echo "<script>window.open('signup.php','_self')</script>";
		}
		
	}
}
	
	




?>