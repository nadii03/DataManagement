<!DOCTYPE html> 
<html lang="en"> 
<head> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>About Us</title> <style> body { font-family: Arial, sans-serif; }

    .container {
        max-width: 800px;
        margin: 0 auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 0;
    }
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        color: #333;
        padding: 10px;
        margin-bottom: 5px;
        background-color: #f2f2f2;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }
    .logo-row {
            display: flex;
            /*justify-content: space-around;*/
            margin-top: 20px;
            margin-bottom: 20px;
        }
    .logo img {
    width: 100%; /* added */
    height: 100%; /* added */
    object-fit: cover; /* added */
}

    .logo {
            width: 100px;
            height: 50px;
            background-color: #ddd;
            margin: 5px;
            display: flex; /* added */
    justify-content: center; /* added */
    align-items: center; /* added */
        }
</style>
    </head> <body> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sky High</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link"  href="home.php">Home</a>
        <a class="nav-link" href="review.php">Reviews</a>
        <a class="nav-link active" aria-current="page" href="#">About Us</a>
        <a class="nav-link">Sign Up</a>
      </div>
    </div>
  </div>
</nav>
<div class="container"> <h1>About Us</h1> <ul>
        <?php
  $conn = mysqli_connect("localhost", "root", "", "phase2");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

        $sql = "SELECT Airline_Name FROM airlines";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["Airline_Name"] . "</li>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </ul>
    <div class="logo-row">
            <div class="logo"><img src="ac.png" alt="Logo 1"></div>
            <div class="logo"><img src="ai.png" alt="Logo 2"></div>
            <div class="logo"><img src="jb.png" alt="Logo 3"></div>
            <div class="logo"><img src="ek.png" alt="Logo 4"></div>
            <div class="logo"><img src="etihad.png" alt="Logo 4"></div>
            <div class="logo"><img src="flyDubai.png" alt="Logo 4"></div>
            <div class="logo"><img src="qatar.png" alt="Logo 4"></div>
        </div>
</div>
</body> 
</html>


