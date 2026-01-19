<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image2.jpg');
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Admin Dashboard</h2>
        <form method="get" action="add_job.php">
            <button type="submit">Add Job</button>
        </form>
        <form method="get" action="delete_job.php">
            <button type="submit" class="delete">Delete Job</button>
        </form>
    </div>
</body>
</html>