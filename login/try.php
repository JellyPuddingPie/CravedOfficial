
<?php
	$hash = crypt('chickenwings');
	echo $hash;
	$password_entered = 'chickenwings';
	
	if(crypt($password_entered, $hash) == $hash) {
		echo '<br>pass correct';
  }else{
	  echo 'pass incorrect';
  }
?>