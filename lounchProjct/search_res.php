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

$src=$_POST['src_port'];
$dst=$_POST['dst_port'];
$date=$_POST['date'];

$sql = "SELECT distinct f.launch_ID, fp.launch_no, ts.dateF, fp.src_ID, fp.dst_ID, ts.dep_time, td.arv_time, stockE, stockB from launch f, fl_pair fp, t_src ts, t_dst td where f.launch_no=fp.launch_no and fp.src_id=ts.src_ID and fp.dst_ID=td.dst_ID and ts.ticket_ID=td.ticket_ID and fp.src_ID='$src' and fp.dst_ID='$dst' and ts.dateF='$date'";

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
  <a href="search_flight.php" class="w3-button w3-bar-item">Search Flight info</a>
  <a href="book_flight.php" class="w3-button w3-bar-item">Book Flights</a>
  <a href="sell.php" class="w3-button w3-bar-item">Sell Tickets(agents)</a>
</nav>

<h2>Results</h2>

<table>
  <tr>
    <th>launch</th>
    <th>launch</th>
    <th>Date</th>
    <th>From</th>
    <th>To</th>
    <th>Arr. Time</th>
    <th>Dep. Time</th>
    <th>Availability(B)</th>
    <th>Availability(E)</th>
  </tr>
<?php
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo'<tr>';
        echo '<td>'.$row['launch_ID'].'</td>' ;
        echo '<td>'.$row['launch_no'].'</td>' ;
        echo '<td>'.$row['dateF'].'</td>' ;
        echo '<td>'.$row['src_ID'].'</td>' ;
        echo '<td>'.$row['dst_ID'].'</td>' ;
        echo '<td>'.$row['dep_time'].'</td>' ;
        echo '<td>'.$row['arv_time'].'</td>' ;
        echo '<td>'.$row['stockE'].'</td>' ;
        echo '<td>'.$row['stockE'].'</td>' ;
        echo'</tr>';
    }
} else {
    echo "0 results";
}
?>

  
</table>
<br>
<h2>Select the launch of your choice</h2>
<div>
  <form action="book_details.php" method="post">
     <label for="launch">Flight No</label>
    <input type="text" id="launch" name="launch" placeholder="launch_no">

    <label for="type">Class</label>
    <input type="radio" name="type" value="business" checked> Business
  <input type="radio" name="type" value="Economy"> Economy<br><br>
  

    <label for="quantity">Qty(between 1 and 5)</label>
    
  <input type="number" name="quantity" min="1" max="5">

      <label for="first_name"><b>First Name</b></label>
    <input type="text" placeholder="First name" name="first_name" required>

    <label for="last_name"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="last_name" required>

    <label for="p_no"><b>Passport #</b></label>
    <input type="text" placeholder="passport no." name="p_no" required>

    <label for="doe"><b>Date of Expiry</b></label>
    <input type="Date" placeholder="YYYY-MM-DD" name="doe" required>

    <label for="contact"><b>Contact Number</b></label>
    <input type="text" placeholder="Contact Number" name="contact" required>

    <label for="country"><b>Country</b></label>
    <input type="text" placeholder="Country" name="country" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    
  <input type="submit" value="Submit">

  </form>

</div>

<a href="homepage.html" >Home</a>



</body>
</html>
