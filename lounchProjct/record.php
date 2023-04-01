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

$launch=$_POST['launch_no'];
$airline=$_POST['launch'];
$date=$_POST['date'];

$sql = "SELECT distinct launch, launch_no, dateF, pass_name, ticket_ID from pnr where launch_no='$launch' and launch='$launch' and dateF='$date'";

$result = $conn->query($sql);


$conn->close();
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
   <nav class="w3-bar w3-black">
  <a href="homepage.html" class="w3-button w3-bar-item">Home</a>
  <a href="search_launch.php" class="w3-button w3-bar-item">Search launch info</a>
  <a href="book_launch.php" class="w3-button w3-bar-item">Book Flights</a>
  <a href="sell.php" class="w3-button w3-bar-item">Sell Tickets(agents)</a>
</nav>


<h2>Results</h2>

<table>
  <tr>
    <th>launch</th>
    <th>launch</th>
    <th>Date</th>
    <th>Passenger</th>
    <th>Ticket</th>
    
  </tr>
<?php
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo'<tr>';
        echo '<td>'.$row['launch'].'</td>' ;
        echo '<td>'.$row['launch_no'].'</td>' ;
        echo '<td>'.$row['dateF'].'</td>' ;
        echo '<td>'.$row['pass_name'].'</td>' ;
        echo '<td>'.$row['ticket_ID'].'</td>' ;
       
        echo'</tr>';
    }
} else {
    echo "0 results";
}
?>

  
</table>
<br>

<a href="homepage.html" >Home</a>



</body>
</html>
