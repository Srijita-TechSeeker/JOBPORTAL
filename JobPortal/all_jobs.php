<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT jobtitle1, comp1, loc1, descr1, logo FROM jobs ORDER BY reg_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Jobs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   <h1> Your Desired Job Listings</h1>
   <section class="latest-jobs">
   <h1>latest jobs</h1>
        <div class="job-listings">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='job'>
                        <img src='" . $row["logo"]. "' alt='" . $row["comp1"]. " logo' class='company-logo'>
                        <h2>" . $row["jobtitle1"]. "</h2>
                        <p><strong>Company:</strong> " . $row["comp1"]. "</p>
                        <p><strong>Location:</strong> " . $row["loc1"]. "</p>
                        <p><strong>Description:</strong> " . $row["descr1"]. "</p>
                      </div>";
            }
        } else {
            echo "<p>No jobs found</p>";
        }
        $conn->close();
        ?>
    </div>
    </section>

</body>
</html>
