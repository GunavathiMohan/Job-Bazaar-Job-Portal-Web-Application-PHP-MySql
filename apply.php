<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        table {
            width: 50%; 
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    
    </style>
    <?php
    $jobId = $_GET['id'];
    ?>
</head>
<body>
    <center>
        <h2>Registration Form</h2>
        <form method="post" action="">
            <table>
                <tr>
                    <th><label>Name:</label></th>
                    <td><input type="text" id="name" name="name" required></td>
                </tr>
                <tr>
                    <th><label>Email:</label></th>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <th><label>Phone Number:</label></th>
                    <td><input type="text" id="phone" name="phone" required></td>
                </tr>
                <tr>
                    <th><label>Highest Qualification:</label></th>
                    <td><input type="text" id="qualification" name="qualification" required></td>
                </tr>
                <tr>
                    <th><label>CGPA:</label></th>
                    <td><input type="number" step="0.01" id="cgpa" name="cgpa" required></td>
                </tr>
                <tr>
                    <th><label>Location:</label></th>
                    <td><input type="text" id="location" name="location" required></td>
                </tr>
                <tr>
                    <th><label>Job ID:</label></th>
                    <td><input type="number" id="job_id" name="job_id" required value="<?php echo $jobId; ?>" readonly></td>
                </tr>
            </table>
            <input type="submit" value="Submit" style="margin-top: 20px;">
        </form>
    </center>
    
</body>
</html>
<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";      // Replace with your MySQL password
$dbname = "job_search";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $cgpa = $_POST['cgpa'];
    $location = $_POST['location'];

    // Insert data into the database
    $sql = "INSERT INTO registrations (name, email, phone, qualification, cgpa, location, job_id) 
            VALUES ('$name', '$email', '$phone', '$qualification', '$cgpa', '$location', '$jobId')";

    if ($conn->query($sql) === TRUE) {
        echo "<center><br>Registration Successful!</center>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>