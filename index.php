<?php
// Connect to the database
$pdo = new PDO('sqlite:client_management.db');

// Handle search
$search = $_GET['search'] ?? '';

// Fetch job sheets
$sql = "SELECT * FROM job_sheets WHERE client_name LIKE :search OR contact_info LIKE :search";
$stmt = $pdo->prepare($sql);
$stmt->execute(['search' => '%' . $search . '%']);
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>HARDIK TRADERS - CLIENT MANAGEMENT DASHBOARD</h1>
    </header>

    <div class="search-container">
        <form method="GET" action="index.php" class="search-form">
            <input type="text" name="search" placeholder="Search by Client Name or ID...">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="new-job-btn-container">
        <a href="create_job.php" class="new-job-btn">New Job Sheet</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th> <!-- Number column -->
                <th>Contact Info</th>
                <th>Received Date</th>
                <th>Inventory</th>
                <th>Reported Issues</th>
                <th>Client Name</th>
                <th>Assigned Technician</th>
                <th>Estimated Deadline</th>
                <th>Client ID</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1; // Initialize counter
            foreach ($jobs as $job): ?>
            <tr>
                <td><?= $count++ ?></td> <!-- Display row number -->
                <td><?= htmlspecialchars($job['contact_info']) ?></td>
                <td><?= htmlspecialchars($job['received_date']) ?></td>
                <td><?= htmlspecialchars($job['inventory_received']) ?></td>
                <td><?= htmlspecialchars($job['reported_issues']) ?></td>
                <td><?= htmlspecialchars($job['client_name']) ?></td>
                <td><?= htmlspecialchars($job['assigned_technician']) ?></td>
                <td><?= htmlspecialchars($job['deadline']) ?></td>
                <td><?= htmlspecialchars($job['id']) ?></td>
                <td><?= htmlspecialchars($job['deadline']) ?></td>
                <td class="<?= strtolower($job['status']) ?>"><?= htmlspecialchars($job['status']) ?></td>
                <td>
                    <a href="view_job.php?id=<?= htmlspecialchars($job['id']) ?>" class="view-btn">View</a>
                    <a href="edit_job.php?id=<?= htmlspecialchars($job['id']) ?>" class="edit-btn">Edit</a>
                    <a href="delete_job.php?id=<?= htmlspecialchars($job['id']) ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <footer>
        <p>© 2024 Hardik Traders</p>
    </footer>
</body>
</html>
