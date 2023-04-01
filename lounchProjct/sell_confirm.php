<!DOCTYPE html>


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

  $license=$_POST['license'];
  $mem=$_POST['mem'];
  $country=$_POST['country'];
  $flight=$_POST['flight_no'];
  $airline=$_POST['airline'];
  $date=$_POST['date'];
  $ticket=$_POST['ticket'];
  $src=$_POST['src_port'];
  $dst=$_POST['dst_port'];
  $price=$_POST['price'];
  $qnty=$_POST['quantity'];
  $type=$_POST['type'];


  $sql = "INSERT INTO agents (Lic_no, Mem_no, country_ID) VALUES ('$license', '$mem','$country')";
  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  $sql="INSERT INTO ticket(ID, price_Dollar, type) VALUES ('$ticket', '$price', '$type') ";
  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;}

  if($type='Business'){$sql="UPDATE flight set stockB=stockB+$qnty where flight_no=$flight";}
  else{$sql="UPDATE flight set stockE=stockE+$qnty where flight_no=$flight";}


  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error" . $sql . "<br>" . $conn->error;
}




  $conn->close();
  ?>

  <html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
  <nav class="w3-bar w3-black">
  <a href="homepage.html" class="w3-button w3-bar-item">Home</a>
  <a href="search_flight.php" class="w3-button w3-bar-item">Search Flight info</a>
  <a href="book_flight.php" class="w3-button w3-bar-item">Book Flights</a>
  <a href="sell.php" class="w3-button w3-bar-item">Sell Tickets(agents)</a>
</nav>

  <a href="homepage.html" >Home</a>

</body>
</html>