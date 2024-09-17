<?php
// Connect to the database
$pdo = new PDO('sqlite:client_management.db');

// Handle file upload
$inventory_file = null;
if (isset($_FILES['inventory_file']) && $_FILES['inventory_file']['error'] === UPLOAD_ERR_OK) {
    $inventory_file = file_get_contents($_FILES['inventory_file']['tmp_name']);
}

// Prepare the SQL
$sql = "UPDATE job_sheets SET 
    client_name = :client_name,
    contact_info = :contact_info,
    received_date = :received_date,
    inventory_received = :inventory_received,
    inventory_file = :inventory_file,
    reported_issues = :reported_issues,
    client_notes = :client_notes,
    assigned_technician = :assigned_technician,
    deadline = :deadline,
    estimated_amount = :estimated_amount,
    status = :status
WHERE id = :id";

$stmt = $pdo->prepare($sql);

// Execute the SQL
$stmt->execute([
    'client_name' => $_POST['client_name'],
    'contact_info' => $_POST['contact_info'],
    'received_date' => $_POST['received_date'],
    'inventory_received' => $_POST['inventory_received'],
    'inventory_file' => $inventory_file,
    'reported_issues' => $_POST['reported_issues'],
    'client_notes' => $_POST['client_notes'],
    'assigned_technician' => $_POST['assigned_technician'],
    'deadline' => $_POST['deadline'],
    'estimated_amount' => $_POST['estimated_amount'],
    'status' => $_POST['status'],
    'id' => $_POST['id']
]);

// Redirect to home page
header('Location: index.php');
