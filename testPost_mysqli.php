<html>
<body>
<?php

try {
//input variables
$a_datum = $_GET['a'];
$b_datum = $_GET['b'];
$c_datum = $_GET['c'];
$d_datum = $_GET['d'];


	//example url call:
	//testPost_mysqli.php?a=X&b=Y&c=Z&d=Q

	// Using mysqli:
	$db = mysqli_connect('localhost','sensor','cee474','testDB');
	if(! $db) {die("Can't connect: " . mysqli_connect_error());}
	/* check connection */
	if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
	}	
	
 	$sql = "INSERT INTO testTable (a, b, c, d)
  					VALUES ('$a_datum', '$b_datum', '$c_datum', '$d_datum')";
	
	//print $sql . "<br/>";
	
	// Using mysqli:
	if (!mysqli_query($db, $sql)){
    		printf("Error: %s\n", mysqli_sqlstate($db));
	}
	
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
</body>
</html>
