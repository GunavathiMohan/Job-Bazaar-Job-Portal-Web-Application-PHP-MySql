<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'job_search');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $description = $_POST['description'];

    // Insert data into the jobs table
    $sql = "INSERT INTO jobs (title, company, location, salary, description)
            VALUES ('$title', '$company', '$location', '$salary', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Job added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Job</h2>
        <form method="post" action="">
            <input type="text" name="title" placeholder="Job Title" required><br>
            <input type="text" name="company" placeholder="Company Name" required><br>
            <input type="text" name="location" placeholder="Location" required><br>
            <input type="number" name="salary" placeholder="Salary" required><br>
            <textarea name="description" placeholder="Job Description" required></textarea><br>
            <input type="submit" value="Add Job">
        </form>
    </div>
</body>
</html>