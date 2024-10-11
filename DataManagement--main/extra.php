<?php
$airline = isset($_GET['airline']) ? urldecode($_GET['airline']) : null;
$flightID = isset($_GET['flightID']) ? urldecode($_GET['flightID']) : null;
$price = isset($_GET['price']) ? urldecode($_GET['price']) : null;
$departureDate = isset($_GET['departure_date']) ? urldecode($_GET['departure_date']) : null;
$returnDate = isset($_GET['return_date']) ? urldecode($_GET['return_date']) : null;
// Extract the offset portion assuming it starts at position 20
$timezoneOffset = substr($returnDate, 20, 6);

// Remove non-numeric characters
$timezoneOffset = preg_replace('/[^0-9]/', '', $timezoneOffset);

// Remove the '+04:00' from the original datetime string
$datetimeWithoutOffset = substr($returnDate, 0, 19);

// Create a DateTime object for the original datetime
$returnDateTime = DateTime::createFromFormat('Y-m-d\TH:i:s', $datetimeWithoutOffset);

// Adjust the datetime based on the timezone offset
$returnDateTime->modify("+$timezoneOffset hours");

// Format the adjusted datetime
$adjustedReturnDate = $returnDateTime->format('Y-m-d H:i:s');

// Extract the offset portion assuming it starts at position 20
$timezoneOffset1 = substr($departureDate, 20, 6);

// Remove non-numeric characters
$timezoneOffset1 = preg_replace('/[^0-9]/', '', $timezoneOffset1);

// Remove the '+04:00' from the original datetime string
$datetimeWithoutOffset1 = substr($departureDate, 0, 19);

// Create a DateTime object for the original datetime
$departureDateTime = DateTime::createFromFormat('Y-m-d\TH:i:s', $datetimeWithoutOffset1);

// Adjust the datetime based on the timezone offset
$departureDateTime->modify("+$timezoneOffset hours");

// Format the adjusted datetime
$adjustedDepartureDate = $departureDateTime->format('Y-m-d H:i:s');

$duration = $departureDateTime->diff($returnDateTime);

// Access the components of the duration (e.g., days, hours, minutes)
$days = $duration->days;
$hours = $duration->h;
$minutes = $duration->i;
echo "Duration: $days days, $hours hours, $minutes minutes";
echo $adjustedReturnDate;
echo $adjustedDepartureDate;

$conn = mysqli_connect("localhost", "root", "", "phase2");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="seat1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script>
    function toggleInputBox() {
            var checkbox = document.getElementById("yesCargo");
            var inputBoxContainer = document.getElementById("inputBoxContainer");

            if (checkbox.checked) {
                inputBoxContainer.classList.remove("hidden");
        }   else {
            inputBoxContainer.classList.add("hidden");
        }
    }
    </script>
        <style>
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-button {
            cursor: pointer;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            text-align: center;
        }
        body {
            background-color: #f0f8ff; /* Light blue background */
            color: #333; /* Dark text color */
            
        }

        .booking-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }

        .tab-button {
            cursor: pointer;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            text-align: center;
            border-radius: 5px;
        }

        .tab-content {
            display: none;
            margin-top: 20px;
        }

        .tab-content.active {
            display: block;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .submit-button {
            background-color: #87CEEB;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #5F9EA0;
        }

    </style>

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sky High</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="home.php">Home</a>
        <a class="nav-link" aria-current="page" href="#">My Bookings</a>
        <a class="nav-link" href="contact.php">About Us</a>
        <a class="nav-link">Sign Up</a>
      </div>
    </div>
  </div>
</nav>
    <div class="booking-form">
        <h1>Booking Form</h1>
        <div>
            <div class="tab-button" onclick="showTab('personalInfo')">Personal Info</div>
            <div class="tab-button" onclick="showTab('seatSelection')">Seat Selection</div>
            <div class="tab-button" onclick="showTab('pay')">Payment</div>
        </div>
        <div id="personalInfo" class="tab-content">
        <form method="post"  id = "bookingForm" >
            <label for="name">First Name:</label>
            <input type="text" id="fname" name="FirstName" required>

            <label for="name">Last Name:</label>
            <input type="text" id="name" name="LastName" required>

            <label for="DOB">Date of Birth:</label>
            <input type="text" id="dob" name="DOB" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="Email" required>

            <label for="Phone_Num">Phone Number:</label>
            <input type="text" id="creditCard" name="Phone_Num" required>
            
            <label for="extraBaggage">Extra Baggage (by bags):</label>
            <input type="text" id="Baggage" name="ExtraBaggage" required>
            
            <label for="extraCargo">Additional cargo (by weight):</label>
            <input type="text" id="cargo" name="ExtraCargo" required> 
            <button class="submit-button" type="submit">Submit Booking</button>  
        </div>
        <div id="seatSelection" class="tab-content">
            
        <div id="tab">
            <div class="plane">
            <div class="select">
                <h1>Select a seat</h1>
            </div>
            <div class="exit"></div>
             <form method="post" id = "bookingForm" >
            <?php
            // Example: generate seats dynamically
            $rows = range('1', '20');
            $columns = range('A', 'F');

            foreach ($rows as $row) {
                echo '<ol class="seats">';
                foreach ($columns as $column) {
                    $seatId = $row . $column;
                    echo '
                        <li class="seat">
                            <input type="checkbox" id="' . $seatId . '" name="selectedSeats[]" value="' . $seatId . '">
                            <label for="' . $seatId . '">' . $seatId . '</label>
                        </li>
                    ';
                }
                echo '</ol>';
            }
            ?>
            <button class="submit-button" type="submit">Submit Booking</button>
        </form>
       </div> 
   </div>
</div>
        <div id="pay" class="tab-content">
            <form method="post" action="boardingPass3.php" >
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" pattern="\d{8}" required placeholder="8 digits">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" pattern="\d{3}" required placeholder="3 digits">
                    <div id="info" class="paymentInfo">
                    <?php echo 'Final Price:  '?>
                    <?php echo '$'.$price ?>
                </div>
                <button type="submit" onclick="submitForm()">Submit Payment</button>
            </form>
        </div>

  <script>
        function showTab(tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => {
                if (tab.id === tabId) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
        }
        function submitForm() {
            // Add your logic to submit the form based on the active tab
            alert('Booking submitted!');
            window.location.href = "boardingPass3.php";// Redirect to seat.php
        }
    </script>
</body>
</html>

<?php
//$Departure_Airport = isset($_POST['Departure_Airport']) ? $_POST['Departure_Airport'] : null;
//$Arrival_Airport = isset($_POST['Arrival_Airport']) ? $_POST['Arrival_Airport'] : null;
//$seats = isset($_POST['hiddenSeats']) ? $_POST['hiddenSeats'] : null;
$FirstName = isset($_POST['FirstName']) ? $_POST['FirstName'] : null;
$LastName = isset($_POST['LastName']) ? $_POST['LastName'] : null;
$DOB = isset($_POST['DOB']) ? $_POST['DOB'] : null;
$Email = isset($_POST['Email']) ? $_POST['Email'] : null;
$Phone_Num = isset($_POST['Phone_Num']) ? $_POST['Phone_Num'] : null;
$Seat = isset($_POST['selectedSeats[]']) ? $_POST['selectedSeats[]'] : null;
$cardNumber = isset($_POST['cardNumber'])? $_POST['cardNumber'] : null;
$CVV = isset($_POST['cvv'])? $_POST['cvv'] : null;


// Collecting form data
$ExtraBaggage = isset($_POST['ExtraBaggage']) ? $_POST['ExtraBaggage'] : null;
$ExtraBaggageCost = 0; // Default cost for no baggage

// Check if extra baggage is selected
if ($ExtraBaggage > 0) {
    // Calculate the cost based on the number of bags or any other criteria
    $costPerBag = 25;
    $ExtraBaggageCost = $ExtraBaggage * $costPerBag;
}

$ExtraCargo = isset($_POST['ExtraCargo']) ? $_POST['ExtraCargo'] : null;
$ExtraCargoCost = 0; // Default cost for no baggage

// Check if extra baggage is selected
if ($ExtraBaggage > 0) {
    // Calculate the cost based on the number of bags or any other criteria
    $costPerKg = 3;
    $ExtraCargoCost = $ExtraCargo * $costPerKg;
}


$conn = mysqli_connect("localhost", "root", "", "phase2");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Escape and sanitize input data
$airline = mysqli_real_escape_string($conn, $airline);
$DOB = mysqli_real_escape_string($conn, $DOB);
$Seat = mysqli_real_escape_string($conn, $Seat);
$FirstName = mysqli_real_escape_string($conn, $FirstName);
$LastName = mysqli_real_escape_string($conn, $LastName);
$Email = mysqli_real_escape_string($conn, $Email);
$Phone_Num= mysqli_real_escape_string($conn, $Phone_Num);
$Seat = mysqli_real_escape_string($conn, $Seat);
$ExtraBaggage = mysqli_real_escape_string($conn, $ExtraBaggage);
$ExtraBaggageCost = mysqli_real_escape_string($conn, $ExtraBaggageCost);
$ExtraCargo = mysqli_real_escape_string($conn, $ExtraCargo);
$ExtraCargoCost = mysqli_real_escape_string($conn, $ExtraCargoCost);
$cardNumber = mysqli_real_escape_string($conn, $cardNumber);
$CVV = mysqli_real_escape_string($conn, $CVV);


$sql = "INSERT INTO flights (FlightId, Departure_date, Arrival_date,Departure_Airport, Arrival_Airport, Seats, Price, AirlineCode)
VALUES ('$flightID', '$adjustedDepartureDate', '$adjustedReturnDate', NULL, NULL, NULL, '$price', '$airline' )";


$sql2 = "INSERT INTO baggage (BaggageID, PassengerID, FlightID, ExtraBaggage, ExtraBaggageCost)
VALUES(DEFAULT, DEFAULT,'$flightID', '$ExtraBaggage',  '$ExtraBaggageCost')";


$sql3 = "INSERT INTO passenger (PassengerID, UserID, FlightID, FirstName, LastName, DOB, Email, Phone_Num)
VALUES(DEFAULT, DEFAULT, '$flightID', '$FirstName', '$LastName', '$DOB', '$Email', '$Phone_Num')";



function generateRandomSeat() {
    $rows = range(1, 10);
    $columns = range('A', 'F');

    $takenSeats = isset($_SESSION['takenSeats']) ? $_SESSION['takenSeats'] : [];

    // Generate a random seat until a unique one is found
    do {
        $randomRow = array_rand($rows);
        $randomColumn = array_rand($columns);
        $seatNumber = $rows[$randomRow] . $columns[$randomColumn];
    } while (in_array($seatNumber, $takenSeats));

    // Mark the seat as taken
    $_SESSION['takenSeats'][] = $seatNumber;

    return $seatNumber;
}

// Example usage:
$randomSeat = generateRandomSeat();

$totalPrice = $price + $ExtraBaggageCost + $ExtraCargoCost;
$sql4 = "INSERT INTO ticket (TicketID, AirlineCode, FlightID, UserID, PassengerID, SeatNo, Cost, Class)
VALUES (DEFAULT,'$airline', '$flightID', DEFAULT, DEFAULT, '$randomSeat', '$totalPrice', 'economy')";


$sql5 = "INSERT INTO payment (CardNumber, UserID, Amount, CVV)
VALUES('$cardNumber', DEFAULT,'$totalPrice','$CVV')";




mysqli_close($conn);
