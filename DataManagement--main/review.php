<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport">
    <title> Reviews </title>
    <style>
    </style>
    <link rel="stylesheet" type="text/css" href="HomeFlight.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     </head>
  <body> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sky High!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link"  href="home.php">Home</a>
        <a class="nav-link active" aria-current="page" href="review.php">Reviews</a>
        <a class="nav-link" href="contact.php">About Us</a>
        <a class="nav-link">Sign Up</a>
      </div>
    </div>
  </div>
</nav>
<?php 
  $conn = mysqli_connect("localhost", "root", "", "phase2");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$feedbackSql = "SELECT Rating, Comments FROM customerfeedback
WHERE Comments IS NOT NULL
ORDER BY FeedbackID DESC LIMIT 5"; // Limiting to the latest 5 feedbacks, adjust as needed
$feedbackResult = mysqli_query($conn, $feedbackSql);

/// Present feedback in a styled table
echo "<style>
        table {
            width: 60%; /* Adjust the width as needed */
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
      </style>";
echo "<table>
        <tr>
            <th>Comment</th>
            <th>Rating</th>
        </tr>";

while ($row = mysqli_fetch_assoc($feedbackResult)) {
    echo "<tr>
            <td>" . $row['Comments'] . "</td>
            <td>" . $row['Rating'] . "</td>
          </tr>";
}

echo "</table>";

?>