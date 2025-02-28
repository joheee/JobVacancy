<?php
require_once __DIR__ . '../../model/job.php';
$job = new Job();
$jobs = $job->getAllJobs(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/job.css">
    <title>Job | Job Vacancy</title>
</head>
<body>

    <!-- Navigation Section -->
    <nav class="nav-parent-container">
        <nav class="nav-container">
            <div class="nav-upper-container">
                <div>Job Vacancy</div>
                <div></div>
            </div>
            <div class="nav-link-container">
                <a href="/view/job.php">Job</a>
                <a href="/view/internship.php">Internship</a>
            </div>
        </nav>

        <!-- Search Bar -->
        <nav class="nav-action-container">
            <input type="text" class="search-input" placeholder="Search for jobs...">
            <button class="search-button">Search</button>
        </nav>
    </nav>

    <!-- Job Listings Section -->
    <section class="job-listings">
        <h2>Available Jobs</h2>

        <?php if (!empty($jobs)): ?>
            <?php foreach ($jobs as $job): ?>
                <div class="job-card">
                    <div class="job-header">
                        <div class="job-info">
                            <h3><?= htmlspecialchars($job["title"]); ?></h3>
                            <p><?= htmlspecialchars($job["location"]); ?></p>
                        </div>
                    </div>
                    <p class="job-description">
                        <?= htmlspecialchars(substr($job["description"], 0, 200)); ?>...
                    </p>
                    <div class="job-footer">
                        <span class="salary">IDR <?= number_format($job["salary"], 0, ',', '.'); ?></span>
                        <button class="apply-button">Apply Now</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No job listings available.</p>
        <?php endif; ?>

    </section>

</body>
</html>
