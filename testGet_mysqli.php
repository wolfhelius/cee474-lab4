<html>
<body>
<?php

try {

	//example url call:
	//testGet_mysqli.php

	// Using mysqli:
	$db = mysqli_connect('localhost','sensor','cee474','testDB');
	if(! $db) {die("Can't connect: " . mysqli_connect_error());}
	/* check connection */
	if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
	}

 	$sql = "SELECT * FROM testTable";
	
	print $sql . "<br/>";
	
	$result = mysqli_query($db,$sql);

	$finfo = mysqli_fetch_fields($result);
	echo "<table border=1>";
	echo "<tr>";
	foreach ($finfo as $val){
		echo "<th>" . $val->name . "</th>";
	}
	echo "</tr>";

	echo "</tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row[0] . "</td><td>" .  $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</tr>";
		echo "</tr>";
	}

	mysqli_close($db);
	
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
</body>
</html>
