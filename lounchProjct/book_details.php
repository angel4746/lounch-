<!DOCTYPE html>
<html><head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
  <nav class="w3-bar w3-black">
  <a href="homepage.html" class="w3-button w3-bar-item">Home</a>
  <a href="search_launch.php" class="w3-button w3-bar-item">Search launch info</a>
  <a href="book_launch.php" class="w3-button w3-bar-item">Book launchs</a>
  <a href="sell.php" class="w3-button w3-bar-item">Sell Tickets(agents)</a>
</nav>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "airline reservation system";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $flight=$_POST['flight'];
  $type=$_POST['type'];
  $qnty=$_POST['quantity'];
  $p_no=$_POST['p_no'];
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $country=$_POST['country'];
  $doe=$_POST['doe'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];

  $sql = "INSERT INTO passenger (p_no,first_name,last_name, country, DOE, email,  contact) VALUES ('$p_no', '$first_name','$last_name', '$country','$doe', '$email', '$contact')";

  

  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
  $sql = "INSERT INTO pnr(airline, flight_no, dateF, pass_name, ticket_ID ) (Select f.airline_ID, f.flight_no, b.dateF, last_name, b.ticket_ID from flight f, boarding b, passenger p where f.flight_no=b.flight_no and p.p_no=$p_no and f.flight_no=$flight limit $qnty  )";

 if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  if($type='Business'){$sql="UPDATE flight set stockB=stockB-$qnty where stockB>$qnty and flight_no=$flight";}
  else{$sql="UPDATE flight set stockE=stockE-$qnty where stockB>$qnty and flight=$flight";}

  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Insufficient tickets available " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT distinct airline,flight_no, pass_name, dateF  FROM pnr where flight_no='$flight' and pass_name='$last_name'";
$result = $conn->query($sql);




  if ($result->num_rows > 0) {
    // output data of each row
    echo"<br><br> Boarding pass for".$last_name."<br><br><br>";
    while($row = $result->fetch_assoc()) {
        
        echo $row['airline']."<br><br>" ;
        echo $row['pass_name']."<br><br>" ;
        echo $row['flight_no']."<br><br>" ;
        echo $row['dateF']."<br><br>" ;
        
        
    }
} else {
    echo "0 results";
}


  $conn->close();
  ?>

  <a href="homepage.html" >Home</a>

</body>
</html>