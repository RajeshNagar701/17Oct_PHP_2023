<?php

/*
A global variable is predefined variable.

A global variable is a programming language construct, 
a variable type that is declared outside any function 
and is accessible to all functions throughout the program.

$GLOBALS  COVERT ANY LOCAL VAR IN TO GLOBAL

$_SERVER 
$_REQUEST 
$_POST 
$_GET 
$_FILES 
$_ENV 
$_COOKIE 
$_SESSION

*/
//echo $a=10;

// // define variable as super global use any were in program;
function addition()   
{
	$x=10; // local
	$y=45;		
	echo $GLOBALS['z']=$x+$y . "<br>";  // CONVERT LOCAL TO GLOBAL
}
addition();

echo $z;


?>