<?php 



function insertMarketData($data){

	$host ="localhost";
	$username = "root";
	$password = "gf12umbgh";
	$database = "pep2";
	$table ="marketdata";
	
	// $host ="localhost";
	// $username = "root";
	// $password = "root";
	// $database = "kingsmen";
	// $table ="marketdata";

	if ($data[4] == '') {
		$data[4] = 0;
	}

	$sql = "INSERT INTO marketdata (isin, name, `date`, price, volume, status)
	VALUES ('$data[0]', '$data[1]', '$data[2]', $data[3], $data[4], $data[5])";

	$conn = new mysqli($host, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "sql connected";
	}

	if ($conn->multi_query($sql) === TRUE) {
	    //echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}

function insertDepthData($data){


	$host ="localhost";
	$username = "root";
	$password = "gf12umbgh";
	$database = "pep2";
	$table ="depth";

	// $host ="localhost";
	// $username = "root";
	// $password = "root";
	// $database = "kingsmen";
	// $table ="depth";

	if ($data[3] == 'Köp') {
		$data[3] = 1;
	} elseif ($data[3] == 'Sälj'){
		$data[3] = 2;
	} else {
		echo "Unknown side! side " . $data[3];
	}

	if ($data[5] == '') {
		$data[5] = 0;
	}
	
	$sql = "INSERT INTO depth (`date`, isin, name, side, price, volume, all_or_nothing, flags)
	VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', $data[5], '$data[6]', $data[7])";

	$conn = new mysqli($host, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "sql connected";
	}

	if ($conn->multi_query($sql) === TRUE) {
	    //echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}


function readData($filename){
	$file = fopen($filename, 'r');
	if ($file) {
		while (($line = fgetcsv($file)) !== FALSE) {
			if (strrpos($filename, "millistream-c")!==false) {
				insertDepthData($line);
			}
			if (strrpos($filename, "millistream-h")!==false) {
				insertMarketData($line);
			}
		}
	}else{
		echo "no such file ".$filename;
	}
	fclose($file);
}



//readData('millistream-c.csv');

function _get_all_file($dir){
	$di = new RecursiveDirectoryIterator($dir);
	$paths = array();
	foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
		if(is_file($filename) && preg_match('/^\./',basename($filename)) == 0){
			$paths[] = $filename;
		}
	}
	return $paths;
}



$path = _get_all_file('done');
foreach ($path as $key => $value) {
	readData($value);
}
?>