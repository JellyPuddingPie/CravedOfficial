<?php
session_start();
$_SESSION["username"] = 'hond';
$_SESSION["user_id"] = 'kat';
$error='';
$servername = "46.21.173.249";
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbname = "bjorngv155_Craved";
$con = mysqli_connect($servername,$username,$password,$dbname);

if(isset($_POST['login'])){




if (empty($_POST['user']) || empty($_POST['pass'])) {
 $error = 'Username or Password is invalid!';
 }

 else{



$user = mysqli_real_escape_string($con,$_POST['user']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);

$userlower = strtolower($user);

$sel_user = "select * from user_logon where user_login_naam='$userlower'";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);

$row = mysqli_fetch_assoc($run_user);
$hash = $row['user_wachtwoord'];
$id = $row['user_id'];

$error = $id . " " . $hash;
    

	
if($check_user > 0){
	
	if(crypt($pass, $hash) == $hash) {
			$_SESSION["username"]=$user;
			$_SESSION["user_id"]=$id;
		
			header("location: index.php"); 
	  }else{
		  $error = 'Username or Password is invalid!';
	  }
}else {

$error = 'Deze fuckign shit werkt niet';
}
mysqli_close($con); 
}
}
?>