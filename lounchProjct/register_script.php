<!DOCTYPE html>
<html>
<body>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "launch reservation system";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$p_no=$_POST['p_no'];
	$first_name=$_POST['last_name'];
	$last_name=$_POST['last_name'];
	$country=$_POST['country'];
	$doe=$_POST['doe'];
	$email=$_POST['email'];
	$psw=$_POST['password'];
	$contact=$_POST['contact'];

	$sql = "INSERT INTO passenger (p_no,first_name,last_name, country, DOE, email, password, contact)
	VALUES ('$p_no', '$last_name', '$country','$doe', '$email','$psw', '$contact')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	?>

</body>
</html>