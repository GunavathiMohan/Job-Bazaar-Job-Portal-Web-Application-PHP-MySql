<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'job_search');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the delete button was clicked
if (isset($_POST['delete'])) {
    $jobId = $_POST['job_id'];

    // Delete the job from the jobs table
    $sql = "DELETE FROM jobs WHERE id = $jobId";

    if ($conn->query($sql) === TRUE) {
        echo "Job deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all jobs to display
$jobQuery = "SELECT * FROM jobs";
$jobResult = $conn->query($jobQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Job</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        button { padding: 5px 10px; background-color: #f44336; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Delete Job</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Company</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php while ($job = $jobResult->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $job['title']; ?></td>
            <td><?php echo $job['company']; ?></td>
            <td><?php echo $job['location']; ?></td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>