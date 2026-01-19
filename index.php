<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'job_search');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all jobs
$jobQuery = "SELECT * FROM jobs";
$jobResult = $conn->query($jobQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Search</title>
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
        .job { border: 1px solid #ddd; padding: 15px; margin: 15px 0; }
        a { text-decoration: none; color: blue; }
        .menu {
            background-color: #2c3e50;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .menu a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .menu a:hover {
            background-color: #1abc9c;
            color: white;
        }
        .menu a.active {
            background-color: #16a085;
            color: white;
        }
        
    </style>
</head>
<body>
<div class="menu">
    <a href="index.php" class="active">Home</a>
    <a href="admin.php">Admin</a>
  </div>
    <div class="container">
        <h1>Available Jobs</h1>
        <?php while ($job = $jobResult->fetch_assoc()) { ?>
            <div class="job">
                <h2><?php echo $job['title']; ?></h2>
                <p><?php echo $job['company']; ?> - <?php echo $job['location']; ?></p>
                <p>Salary: <?php echo $job['salary']; ?></p>
                <a href="job_details.php?id=<?php echo $job['id']; ?>">View Details</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
