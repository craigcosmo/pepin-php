<?php 
function readcsv($filename){
	$file = fopen($filename, 'r');
	while (($line = fgetcsv($file)) !== FALSE) {
	  //$line is an array of the csv elements
	  print_r($line);
	}
	fclose($file);
}



$host ="localhost";
$username = "root";
$password = "root";
$database = "kingsmen";
$table ="marketdata";
$con = mysql_connect($host,$username,$password);

// echo "hello";

if($con === true){
   echo "connected";
}

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// function insertdata(){

// }

// readcsv('file.csv')

?>