<!DOCTYPE html><?php session_start();?>

<html>

<head>

<title>User Login</title>

</head>

<body>

<form action="createuser.php" method="post">

<table width="500" align="center" bgcolor="skyblue">

<tr align="center">

<td colspan="3"><h2>User Login</h2></td>

</tr>
<tr>

<td align="right"><b>Username</b></td>

<td><input type="text" name="user" required="required"/></td>

</tr>

<tr>

<td align="right"><b>Email</b></td>

<td><input type="text" name="email" required="required"/></td>

</tr>

<tr>

<td align="right"><b>Password:</b></td>

<td><input type="password" name="pass" required="required"></td>

</tr>
<tr>

<td align="right"><b>Confirm Password:</b></td>

<td><input type="password" name="pass2" required="required"></td>

</tr>
<tr>

<td align="right"><b>Voornaam:</b></td>

<td><input type="text" name="voornaam" required="required"></td>

</tr>
<tr>

<td align="right"><b>Achternaam:</b></td>

<td><input type="text" name="achternaam" required="required"></td>

</tr>

<tr>

<td align="right"><b>Telefoon:</b></td>

<td><input type="text" name="telefoon" required="required"></td>

</tr>
<tr>

<td align="right"><b>Geslacht:</b></td>

<td><input type="text" name="geslacht" required="required">'M' of 'V'</td>

</tr>
<tr align="center">

<td colspan="3">

<input type="submit" name="signup" value="signup"/>

</td>

</tr>

</table>

</form>

</body>

</html>