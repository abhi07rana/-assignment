<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Job Sheet</title>
    <link rel="stylesheet" href="assets/css/create_job.css">
</head>
<body>
    <h1>Create New Job Sheet</h1>
    <div class="container">
        <form action="save_job.php" method="POST" enctype="multipart/form-data">
            <label>Client Name:</label>
            <input type="text" name="client_name" required><br>

            <label>Contact Info (Phone 10 nos):</label>
            <input type="text" name="contact_info" required><br>

            <label>Received Date:</label>
            <input type="date" name="received_date" required><br>

            <label>Inventory Received:</label>
            <input type="text" name="inventory_received" required><br>

            <label>Upload Inventory Image/Document/Video:</label>
            <input type="file" name="inventory_file"><br>

            <label>Reported Issues:</label>
            <textarea name="reported_issues"></textarea><br>

            <label>Client Notes:</label>
            <textarea name="client_notes"></textarea><br>

            <label>Assigned Technician:</label>
            <input type="text" name="assigned_technician"><br>

            <label>Deadline:</label>
            <input type="date" name="deadline" required><br>

            <label>Estimated Amount:</label>
            <input type="number" step="0.01" name="estimated_amount"><br>

            <label>Status:</label>
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select><br>

            <button type="submit">Save Job Sheet</button>
        </form>
    </div>
</body>
</html>
