<?php
$conn = mysqli_connect("localhost", "root", "", "phase2");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get the information for the boarding pass
$sql = "SELECT
            F.AirlineCode AS Airline,
            P.FirstName AS FirstName,
            P.LastName AS LastName,
            F.Departure_Date AS DepartureDate,
            F.Arrival_Date AS ArrivalDate,
            F.FlightID AS flightID,
            T.SeatNo AS SeatNo,
            T.Cost AS Cost,
            T.Class AS Class,
            T.TicketID AS Ticket
        FROM
            Passenger AS P
        JOIN Ticket AS T ON P.FlightID = T.FlightID
        JOIN Flights AS F ON T.FlightID = F.FlightID

        ORDER BY T.TicketID DESC
        LIMIT 1"; // Assuming TicketID is the primary key and you want the maximum one

$result = mysqli_query($conn, $sql);

if ($result) {
    // Fetch the data
    $row = mysqli_fetch_assoc($result);

    // Assign the values to variables
    $airline = $row['Airline'];
    $firstName = $row['FirstName'];
    $lastName = $row['LastName'];
    $flightID = $row['flightID'];
    $departureDate = $row['DepartureDate'];
    $arrivalDate = $row['ArrivalDate'];
    $seatNumber = $row['SeatNo'];
    $cost = $row['Cost'];
    $class = $row['Class'];
    $ticket = $row['Ticket'];

    $boardingPassHTML = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
        <style>
            /* Your existing styles here */

            /* Adjusted styles for the layout */
            body{
                n=margin-top: 50px;
            }
            .left-column {
                background-color: #fff; /* Adjust the background color as needed */
                padding: 20px;
                border: 2px solid lightgray;
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
            }

            .middle-column {
                background-color: #fff; /* Adjust the background color as needed */
                padding: 20px;
                border: 2px solid lightgray;
            }

            .right-column {
                background-color: #376b8d; /* Adjust the background color as needed */
                padding: 20px;
                border: 2px solid lightgray;
                border-top-right-radius: 25px;
                border-bottom-right-radius: 25px;
            }

        </style>
    </head>
    <body>
        <div class='container-fluid'>
            <div class='row mb-5'>
                <div class='col-md-4 left-column'>
                    <!-- Left column content -->
                    <p class='txt'>" . $ticket . "</p>
                    <h2 class='text-secondary mb-0 brand'>E-Ticket</h2>
                    <p class='head'>Class</h2>
                    <p class='h5 text-uppercase'>" . $class . "</p>
                    <p class='head'>Airline</p>
                    <p class='h5 text-uppercase'>" . $airline . "</p>
                     <p class='head'>Passenger</p>
                    <p class='h5 text-uppercase'>" . $firstName . " " . $lastName . "</p>
                </div>
                <div class='col-md-4 middle-column'>
                    <!-- Middle column content -->
                    <p class='head'>Departure</p>
                    <p class='txt font-weight-bold mb-3'>" .$departureDate. "</p>
                    <p class='head'>Arrival</p>
                    <p class='txt font-weight-bold mb-1'>" . $arrivalDate. "</p>
                      <p class='head'>Seat</p>
                    <p class='h5 text-uppercase'>" . $seatNumber . "</p>
                </div>
                <div class='col-md-4 right-column'>
                    <!-- Right column content -->
                    <div class='row'>
                        <div class='col'>
                        </div>
                    </div>
                    <div class='row justify-content-center'>
                        <div class='col-12'>
                            <img src='Capture.JPG' class='mx-auto d-block' height='180px' width='200px' alt='SkyHigh'>
                        </div>
                    </div>
                    <div class='row'>
                        <h3 class='text-light2 text-center mt-2 mb-0'>
                            &nbsp; <br> <br>
                            Please be at the gate at boarding time
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
    </body>
    </html>";

    echo $boardingPassHTML;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>