<?php

// establishing the MySQLi connection

$servername = "46.21.173.249";
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbname = "bjorngv155_Craved";
$error=''; 
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())

{

$error = "no sql connection, contact site administrator";

}

// checking the user

if(isset($_POST['login'])){

$user = mysqli_real_escape_string($con,$_POST['user']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);


if (empty($user) || empty($pass) {
 $error = 'Username or Password is invalid';
 }else{

$sel_user = "select * from user_logon where user_login_naam='$user'";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);
 while($row = $run_user->fetch_assoc()) {
        $hash = $row['user_wachtwoord'];
		$id = $row['user_id'];
    }

	
if($check_user == 1){
	
	if(crypt($pass, $hash) == $hash) {
			$_SESSION['user_username']=$user;
			$_SESSION['user_id']=$id;
			header("location: index.php"); ;
	  }else{
		  $error = 'Password incorrect!';
	  }
}else {

$error = 'Username not found, try again!';
}
mysql_close($con); 
}
}







?>