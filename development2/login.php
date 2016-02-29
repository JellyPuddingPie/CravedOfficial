
<?php 

include('authorize.php'); 

?>
<!DOCTYPE html>
<html>

<head>

<title>User Login</title>

</head>

<body>

<form action="" method="post">

<table width="500" align="center" bgcolor="skyblue">

<tr align="center">

<td colspan="3"><h2>User Login</h2></td>

</tr>

<tr>

<td align="right"><strong>Username</strong></td>

<td><input type="text" name="user" required="required"/></td>

</tr>

<tr>

<td align="right"><strong>Password:</strong></td>

<td><input type="password" name="pass" required="required"></td>

</tr>
<tr>
<td></td>
<td align="left"><span style="color:red;"><strong><?php echo $error; ?></strong></span></td>

</tr>
<tr>
<td></td>
<td align="left"><span><strong>No account? Please <a href="signup.php">register</a>.</strong></td>

</tr>

<tr align="center">

<td colspan="3">

<input type="submit" name="login" value="Login"/>

</td>

</tr>

</table>

</form>

</body>

</html>