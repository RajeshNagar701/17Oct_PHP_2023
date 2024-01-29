<?php

$a;     //not set
$b=20;  // set


// check value of variable is set or not
$p=20;  

if(isset($p))
{
	echo "set";
}
else
{
	echo "Not set";
}

//==============================================================

if(isset($_REQUEST['submit']))
{
	
	
}

?>


<form action=""  method="post">
	
	Name : <input type="text" name="name" placeholder="Enter Name">
	<br>
	<br>
	Email : <input type="email" name="email" placeholder="Enter email">
	<br>
	<br>
	<input type="submit" name="submit" value="Register">
</form>