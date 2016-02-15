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

if(isset($_POST['login'])){

$user = mysqli_real_escape_string($con,$_POST['user']);

$pass = mysqli_real_escape_string($con,$_POST['pass']);

$sel_user = "select * from user_logon where user_login_naam='$user'";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);
 while($row = $run_user->fetch_assoc()) {
        $hash = $row['user_wachtwoord'];
		$id = $row['user_id'];
    }

	
if($check_user>0){
	
	if(crypt($pass, $hash) == $hash) {
			echo '<br>pass correct';
	  }else{
		  echo 'pass incorrect';
	  }

$_SESSION['user_username']=$user;
$_SESSION['user_id']=$id;

echo "<script>window.open('login.php','_self')</script>";

}

else {

echo "<script>alert('Email or password is not correct, try again!')</script>";

}
}







?>