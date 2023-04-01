<!DOCTYPE html>


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

  $id=$_POST['id'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $rank=$_POST['rank'];
  $salary=$_POST['salary'];
  


  $sql = "INSERT INTO pilot (id, first_name, middle_name, last_name,rank, salary) VALUES ('$id', '$fname','$mname','$lname','$rank', '$salary')";
  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
  <a href="search_launch.php" class="w3-button w3-bar-item">Search launch info</a>
  <a href="book_launch.php" class="w3-button w3-bar-item">Book launchs</a>
  <a href="sell.php" class="w3-button w3-bar-item">Sell Tickets(agents)</a>
</nav>

  <a href="homepage.html" >Home</a>

</body>
</html>