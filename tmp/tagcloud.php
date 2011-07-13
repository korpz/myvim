<?php
	
	//connection information
  $host = "localhost";
  $user = "root";
  $password = "your_password_here";
  $database = "tagcloud";
	
	//make connection
  $server = mysql_connect($host, $user, $password);
  $connection = mysql_select_db($database, $server);
	
	//query the database
  $query = mysql_query("SELECT * FROM tags");
	
	//start json object
	$json = "({ tags:["; 
	
	//loop through and return results
  for ($x = 0; $x < mysql_num_rows($query); $x++) {
    $row = mysql_fetch_assoc($query);
		
		//continue json object
    $json .= "{tag:'" . $row["tag"] . "',freq:'" . $row["frequency"] . "'}";
		
		//add comma if not last row, closing brackets if is
		if ($x < mysql_num_rows($query) -1)
			$json .= ",";
		else
			$json .= "]})";
  }
	
	//return JSON with GET for JSONP callback
	$response = $_GET["callback"] . $json;
	echo $response;

	//close connection
	mysql_close($server);

?>