<!DOCTYPE html>
<?php
include('createuser.php');
?>
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

<td align="right"><b>Username</b></td>

<td><input type="text" name="user" required="required" value=<?php echo $user; ?> ></td>

</tr>

<tr>

<td align="right"><b>Email</b></td>

<td><input type="text" name="email" required="required" value=<?php echo $email; ?> ></td>

</tr>

<tr>

<td align="right"><b>Password:</b></td>

<td><input type="password" name="pass" required="required" ></td>

</tr>
<tr>

<td align="right"><b>Confirm Password:</b></td>

<td><input type="password" name="pass2" required="required"></td>

</tr>
<tr>

<td align="right"><b>Voornaam:</b></td>

<td><input type="text" name="voornaam" required="required" value=<?php echo $voornaam; ?> ></td>

</tr>
<tr>

<td align="right"><b>Achternaam:</b></td>

<td><input type="text" name="achternaam" required="required" value=<?php echo $achternaam; ?> ></td>

</tr>

<tr>

<td align="right"><b>Telefoon:</b></td>

<td><input type="text" name="telefoon" required="required" value=<?php echo $telefoon; ?>></td>

</tr>
<tr>

<td align="right"><b>Geslacht:</b></td>

<td><input type="radio" name="geslacht" <?php if (isset($gender) && $gender=="M") echo "checked";?>  value="M">Man
	<input type="radio" name="geslacht" <?php if (isset($gender) && $gender=="V") echo "checked";?>  value="V">Vrouw
    <span class="error">* <?php echo $genderErr;?></span></td>

</tr>
<tr>
<td></td>
<td><input name="accept" type="checkbox" value="1" />By clicking this, I aggree with the terms.</td>
<td align="left"><span style="color:red;"><strong><?php echo $error; ?></strong></span></td>

</tr>
<tr>
<tr align="center">

<td colspan="3">

<input type="submit" name="signup" value="signup"/>

</td>

</tr>

</table>

</form>

</body>

</html>