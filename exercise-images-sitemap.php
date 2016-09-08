<?php
	header("Content-Type: text/xml"); //set the content type to xml
	// Initialize the xmlOutput variable
	$xmlBody = '<?xml version="1.0" encoding="ISO-8859-1"?>';
	$xmlBody .= "<XML>";
	// Connect to your MySQL database whatever way you like to here
	require_once('inc/db_vidainglescore_conn.php');
	// Execute the Query on the database to select items(20 in this example)
	$sql = "SELECT * FROM ejercicios WHERE ejer_activated='1'";
	$qry = mysqli_query($db_conx,$sql);
	while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC)){
    // Set DB variables into local variables for easier use 
    $ejerImageName = $row["ejer_image_name"]; 
    // Start filling the $xmlBody variable with looping content here inside the while loop 
    // It will loop through 20 items from the database and render into XML format
    $xmlBody .= '
		<Data> 
    <url>http://vidaingles.com/i/'.$ejerImageName.'</url>
		</Data>';
	} // End while loop
	$xmlBody .= "</XML>";
	echo $xmlBody; // output
?>