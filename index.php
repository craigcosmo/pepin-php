<?php 
function readcsv($filename){
	$file = fopen($filename, 'r');
	while (($line = fgetcsv($file)) !== FALSE) {
	  //$line is an array of the csv elements
		// print_r($line);
		insertdata($sline)
	}
	fclose($file);
}



function insertdata($data){

	$host ="localhost";
	$username = "root";
	$password = "root";
	$database = "kingsmen";
	$table ="marketdata";

	$sql = "INSERT INTO marketdata (isin, name, `date`, price, volume, status)
	VALUES ($data[0], $data[1], $data[2], $data[3], $data[4], $data[5])";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		// echo "sql connected";
	}

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}

insertdata( [1232, 'lego', '2017-06-11'], 65, 1, 0)

// readcsv('file.csv')

?>