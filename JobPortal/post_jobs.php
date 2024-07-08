<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job";
$uploadDir = 'uploads/';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    
    // Handle file upload
    $logoName = basename($_FILES["company_logo"]["name"]);
    $targetFilePath = $uploadDir . $logoName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["company_logo"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO jobs (jobtitle1, comp1, loc1, descr1, logo)
                VALUES ('$job_title', '$company', '$location', '$description', '$targetFilePath')";

        if ($conn->query($sql) === TRUE) {
            echo "New job posted successfully. <a href='all_jobs.php'>View All Jobs</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
