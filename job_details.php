<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'job_search');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$jobId = $_GET['id'];

// Fetch the job details
$jobQuery = "SELECT * FROM jobs WHERE id = $jobId";
$jobResult = $conn->query($jobQuery);
$job = $jobResult->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Details</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            text-align: center;
            background-image: url('image2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 80%; margin: auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $job['title']; ?></h1>
        <p>Company: <?php echo $job['company']; ?></p>
        <p>Location: <?php echo $job['location']; ?></p>
        <p>Salary: <?php echo $job['salary']; ?></p>
        <p><?php echo nl2br($job['description']); ?></p>
        <a href="apply.php?id=<?php echo $job['id']; ?>">Apply for this job</a>
    </div>
</body>
</html>
