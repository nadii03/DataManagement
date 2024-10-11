<?php
$connect = new PDO("mysql:host=localhost;dbname=phase2", "root", "");
$query = "
  SELECT City FROM airport";
$result = $connect ->query($query);

$query2 = "
    SELECT Airline_Name FROM airlines";
$airlines = $connect ->query($query2);

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport">
    <title> Sky High </title>
    <link rel="stylesheet" type="text/css" href="oneway.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
    <div id="wrapper">
        <div class="scrollbar" id="style-default">
          <div class="force-overflow"></div>
        </div>
        <div class="scrollbar" id="style-7">
          <div class="force-overflow"></div>
        </div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" id="logo" href="#">SkyHigh Travels!</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="nav justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#">My Bookings</a>
              <a class="nav-link" href="#">Contact Us</a>
              <a class="nav-link">Sign Up</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="welcome"></div>


    <div class="bod">
      <div class="row">
        <div class="col-lg-2">
          
        </div>
          <div class="d-flex flex-column col-md-8">
             <ul class="nav nav-underline">
            <li class="nav-item">
              <a class="nav-link"href="home.php">Round-trip</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">One way</a>
            </li>
          </ul>
 
          <form id="start" method="post" action="extra.php"  >
          <div id="searchWrapper">
            <!--<h1>Parameters</h1> -->
            <input id="origin" placeholder="search for city/airport" name="Departure_Airport" required>
               <input id="destination" placeholder="search for city/airport" name="Arrival_Airport">
               <input id="d_date" type="date" placeholder="departure date">

                <div id="inputBoxContainer2" class="hidden">
              <label for="seats">Available Seats:</label>
              <input type="text" id="seats" name="seats" readonly>
               <br>
               <!-- Hidden input to store the calculated seats for submission -->
                <input type="hidden" id="hiddenSeats" name="hiddenSeats" value="">
                </div>
                <br>
                <button id="submit" type="submit">Search Flights</button>
            </form>
          </div>
             <ul id="flightsList"></ul>
        </div>
      </div>
    </div>
  </script><script src="app3.js"></script>
  <div class="foot"></div>
   </body> 
  </html>