<?php
session_start();
$error='';
$servername = "localhost";
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbname = "bjorngv155_Craved";
$con = mysqli_connect($servername,$username,$password,$dbname);

$email = "";
$user ="";
$pass = "";
$pass2 = "";
$voornaam = "";
$achternaam = "";
$telefoon = "";
$geslacht = "";
$accepted = "";
$genderErr = "";

if(isset($_POST['login'])){




if (empty($_POST['user']) || empty($_POST['pass'])) {
 $error = 'Username or Password is invalid!';
 }

 else{



$user = mysqli_real_escape_string($con,$_POST['user']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);

$userlower = strtolower($user);

$sel_user = "select * from users where username='$userlower'";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);

$row = mysqli_fetch_assoc($run_user);
$hash = $row['password'];
$id = $row['user_id'];

$error = $id . " " . $hash;
    

	
if($check_user > 0){
	
	if(password_verify ($pass, $hash)) {
			$_SESSION["username"]=$user;
			$_SESSION["user_id"]=$id;
		
			header("location: index.php"); 
	  }else{
		  $error = 'Username or Password is invalid!';
	  }
}else {

$error = 'Username or Password is invalid!';
}
mysqli_close($con); 
}
}

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
		
	
	$check_user = "select username from users where username='$userlower'";
	$check_email = "select email from users where email='$email'";
	
	$run_user = mysqli_query($con, $check_user);
	$run_email = mysqli_query($con, $check_email);
	if(mysqli_num_rows($run_user)>0){
		$error = "User bestaat al!";
	}elseif (mysqli_num_rows($run_email)>0){
		$error = "Email adres wordt al gebruikt!";
	}else{
		
		if($pass === $pass2){
			if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
				$options = ['cost' => 11,'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),];
				$hash = password_hash($pass, PASSWORD_BCRYPT, $options);
				$insert_user = "insert into users (username, password, voornaam,achternaam, telefoonnummer, geslacht, email) values ('$userlower','$hash','$voornaam','$achternaam','$telefoon','$geslacht','$email')";
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
mysqli_close($con);
}
?>