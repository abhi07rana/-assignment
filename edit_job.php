<?php
// Fetch job details
$pdo = new PDO('sqlite:client_management.db');
$id = $_GET['id'];
$sql = "SELECT * FROM job_sheets WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$job = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Sheet</title>
    <link rel="stylesheet" href="assets/css/edit_job.css">
</head>
<body>
    <h1>Edit Job Sheet</h1>
    <div class="container">
        <form action="update_job.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($job['id']) ?>">
            <label>Client Name:</label>
            <input type="text" name="client_name" value="<?= htmlspecialchars($job['client_name']) ?>" required><br>

            <label>Contact Info:</label>
            <input type="text" name="contact_info" value="<?= htmlspecialchars($job['contact_info']) ?>" required><br>

            <label>Received Date:</label>
            <input type="date" name="received_date" value="<?= htmlspecialchars($job['received_date']) ?>" required><br>

            <label>Inventory Received:</label>
            <input type="text" name="inventory_received" value="<?= htmlspecialchars($job['inventory_received']) ?>" required><br>

            <label>Upload New Inventory File (optional):</label>
            <input type="file" name="inventory_file"><br>

            <label>Reported Issues:</label>
            <textarea name="reported_issues"><?= htmlspecialchars($job['reported_issues']) ?></textarea><br>

            <label>Client Notes:</label>
            <textarea name="client_notes"><?= htmlspecialchars($job['client_notes']) ?></textarea><br>

            <label>Assigned Technician:</label>
            <input type="text" name="assigned_technician" value="<?= htmlspecialchars($job['assigned_technician']) ?>"><br>

            <label>Deadline:</label>
            <input type="date" name="deadline" value="<?= htmlspecialchars($job['deadline']) ?>" required><br>

            <label>Estimated Amount:</label>
            <input type="number" step="0.01" name="estimated_amount" value="<?= htmlspecialchars($job['estimated_amount']) ?>"><br>

            <label>Status:</label>
            <select name="status">
                <option value="Pending" <?= $job['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="In Progress" <?= $job['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                <option value="Completed" <?= $job['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select><br>

            <button type="submit" class="save">Save Changes</button>
            <button type="button" class="cancel" onclick="window.location.href='view_job.php?id=<?= htmlspecialchars($job['id']) ?>'">Cancel</button>
        </form>
    </div>
</body>
</html>
