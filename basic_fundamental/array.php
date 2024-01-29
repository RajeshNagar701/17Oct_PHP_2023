<?php

$name1="Raj";
$name2="Raheen";
$name3="Mayank";
		
		// index 0
$students=array("Raj","Raheen","Mayank","Akash");


// its used for arr print
//print_r($students);

echo $students[0];
echo $students[1];
echo $students[2];
echo $students[3];



foreach($students as $data)
{
	echo "<h1>".$data."</h1>";
}


?>
