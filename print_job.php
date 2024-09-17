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
    <title>Print Job Sheet</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body onload="window.print();">
    <h1>Job Sheet - <?= $job['client_name'] ?></h1>
    <p>Client Name: <?= $job['client_name'] ?></p>
    <p>Contact Info: <?= $job['contact_info'] ?></p>
    <p>Received Date: <?= $job['received_date'] ?></p>
    <p>Inventory Received: <?= $job['inventory_received'] ?></p>
    <p>Reported Issues: <?= $job['reported_issues'] ?></p>
    <p>Client Notes: <?= $job['client_notes'] ?></p>
    <p>Assigned Technician: <?= $job['assigned_technician'] ?></p>
    <p>Deadline: <?= $job['deadline'] ?></p>
    <p>Estimated Amount: <?= $job['estimated_amount'] ?></p>
    <p>Status: <?= $job['status'] ?></p>
</body>
</html>
