<?php
// Connect to the database
$pdo = new PDO('sqlite:client_management.db');

// Prepare the SQL
$sql = "DELETE FROM job_sheets WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);

// Redirect to home page
header('Location: index.php');
