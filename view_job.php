<?php
// Fetch the job sheet details by ID
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
    <title>View Job Sheet</title>
    <link rel="stylesheet" href="assets/css/view_job.css">
</head>
<body>
    <h1>View Job Sheet</h1>
    <div class="container">
        <div class="details-section">
            <div class="label">Client Name:</div>
            <div class="data"><?= htmlspecialchars($job['client_name']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Contact Info:</div>
            <div class="data"><?= htmlspecialchars($job['contact_info']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Received Date:</div>
            <div class="data"><?= htmlspecialchars($job['received_date']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Inventory Received:</div>
            <div class="data"><?= htmlspecialchars($job['inventory_received']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Reported Issues:</div>
            <div class="data"><?= htmlspecialchars($job['reported_issues']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Client Notes:</div>
            <div class="data"><?= htmlspecialchars($job['client_notes']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Inventory Image/Document/Video:</div>
            <div class="data">
                <?php if ($job['inventory_file']): ?>
                    <a href="view_file.php?id=<?= htmlspecialchars($job['id']) ?>" class="link-blue">View File</a>
                <?php else: ?>
                    No file available
                <?php endif; ?>
            </div>
        </div>
        <div class="details-section">
            <div class="label">Assigned Technician:</div>
            <div class="data"><?= htmlspecialchars($job['assigned_technician']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Deadline:</div>
            <div class="data"><?= htmlspecialchars($job['deadline']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Estimated Amount:</div>
            <div class="data"><?= htmlspecialchars($job['estimated_amount']) ?></div>
        </div>
        <div class="details-section">
            <div class="label">Status:</div>
            <div class="data"><?= htmlspecialchars($job['status']) ?></div>
        </div>

        <div class="notes-section">
            <p class="section-label">Add or Update Note:</p>
            <textarea name="notes" placeholder="Add notes here..." rows="4" cols="50"></textarea>
            <a href="save_note.php?id=<?= htmlspecialchars($job['id']) ?>" class="btn-blue">Save Note</a>
        </div>

        <div class="button-group">
            <a href="edit_job.php?id=<?= htmlspecialchars($job['id']) ?>" class="link-blue">Edit Job</a>
            <a href="delete_job.php?id=<?= htmlspecialchars($job['id']) ?>" class="link-blue">Delete Job</a><br>
            <a href="index.php" class="button-white">Back</a><br>
            <a href="save_pdf.php?id=<?= htmlspecialchars($job['id']) ?>" class="button-white">Save as PDF</a>
        </div>
    </div>
</body>
</html>
