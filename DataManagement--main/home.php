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
    <title> Let's go! </title>
    <link rel="stylesheet" type="text/css" href="styling.css">
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
              <a class="nav-link" href="review.php">Reviews</a>
              <a class="nav-link" href="contact.php">About Us</a>
              <a class="nav-link">Sign Up</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="welcome"></div>

      <div class="bod">
          <div class="row">
            <div class="col-lg-2"></div>
              <div class="d-flex flex-column">
                 <ul class="nav nav-underline">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Round-trip</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="oneway.php">One way</a>
                </li>
                </ul>
              </div>
     
              <div class="col-md-3">&nbsp;</div>
              <div class="col-md-8">
                <form id="start" method="post" action="extra.php"  >
                  <div id="searchWrapper">
                    <!--<h1>Parameters</h1> -->
                    <label for="going"></label>
                    <input type="text" placeholder="search for city/airport" id="origin" name="Departure_Airport" required>
                    <input id="destination" placeholder="search for city/airport" name="Arrival_Airport">
                    <input id="d_date" type="date" placeholder="departure date">
                    <input id="r_date" type="date" placeholder="return date">
                    <div id="inputBoxContainer2" class="hidden">
                      <label for="seats">Available Seats:</label>
                      <input type="text" id="seats" name="seats" readonly>
                      <br>
                      <!-- Hidden input to store the calculated seats for submission -->
                      <input type="hidden" id="hiddenSeats" name="hiddenSeats" value="">
                    </div>
                    <button id="submit" type="submit">Search Flights</button>
                  </div>
                </form>
              </div>
              <ul id="flightsList"></ul>
          </div>
        </div>
      <script src="app2.js"></script>
      <div class="foot"></div>
      </nav>
      </div>
    </div>
  </body>



