<!DOCTYPE html>

  <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>

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
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
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

<form action="fly.php"method="post">
  <div class="container">
    <h1>Pilot Info</h1>
    <p>Please fill in the appropriate fields</p>
    <hr>

     <label for="id"><b>ID #</b></label>
    <input type="text" placeholder="ID #" name="id" required>

    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="fname" required>

    <label for="mname"><b>Middle name</b></label>
    <input type="text" placeholder="Middle name" name="mname" required>
<br>

<label for="lname"><b>last_name</b></label>
    <input type="text" placeholder="Last name" name="lname" required>
<br>

     <label for="rank"><b>Rank</b></label>
    <input type="text" placeholder="Rank" name="rank" required>
  
 
    <label for="salary"><b>Salary</b></label>
    <input type="text"  name="salary" required>

    
    
    <button type="submit" class="registerbtn">submit</button>
  </div>
  
  
</form>
<a href="homepage.html" >Home</a>
</body>
</html>
