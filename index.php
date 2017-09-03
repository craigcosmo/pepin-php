<?php 



function insertMarketData($data){

	$host ="localhost";
	$username = "root";
	$password = "root";
	$database = "kingsmen";
	$table ="marketdata";

	$sql = "INSERT INTO marketdata (isin, name, `date`, price, volume, status)
	VALUES ('$data[0]', '$data[1]', '$data[2]', $data[3], $data[4], $data[5])";

	$conn = new mysqli($host, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		echo "sql connected";
	}

	if ($conn->multi_query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}

function insertDepthData($data){

	$host ="localhost";
	$username = "root";
	$password = "root";
	$database = "kingsmen";
	$table ="marketdata";

	$sql = "INSERT INTO depth (`date`, isin, name, side, price, volume, all_or_nothing, flags)
	VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', $data[5], '$data[6]', $data[7])";

	$conn = new mysqli($host, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		echo "sql connected";
	}

	if ($conn->multi_query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}

// insertdata( array(1232, "lego", "2017-06-11", 65, 1, 0) );


function readMarketData($filename){
	$file = fopen($filename, 'r');
	while (($line = fgetcsv($file)) !== FALSE) {
		// print_r($line);
		insertMarketData($line);
	}
	fclose($file);
}

function readDepth($filename){
	$file = fopen($filename, 'r');
	while (($line = fgetcsv($file)) !== FALSE) {
		insertDepthData($line);
	}
	fclose($file);
}


// readMarketData('file.csv');
readDepth('millistream.csv');


?>