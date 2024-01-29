<?php

/*
$a=20;
$b=10;
echo $sum=$a+$b;
*/


// user defined function

/*

function sum()
{
	$a=10;
	$b=20;
	echo $sum=$a+$b."<br>";
}
sum();
sum();

*/


//buil in function predifined function
/*

$abc="Raj nagar";
echo strlen($abc);

*/



// function with parameter / argument
/*
function sum($a,$b)
{
	echo $sum=$a+$b."<br>";
}
sum(10,30);
sum(20,20);
sum(80,9);
*/


/*
function select($tbl)
{
	echo $sel="select * from $tbl<br>";
}
select('feedback');
select('customer');
select('contact');
select('blog');
*/



// Default value

/*
function sum($a=0,$b=0)
{
	echo $sum=$a+$b."<br>";
}
sum(5,10);  // 15
sum();      // 0
sum(5);     // 5+0 =5


*/



// Return in function

function raj()
{
	$a=10;
	$b=20;
	return $sum=$a+$b."<br>";
}
echo raj();
?>