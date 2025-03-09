<?php
require_once __DIR__ . '../../model/job.php';
$job = new Job();

$searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($searchKeyword) {
    $jobs = $job->searchJobs($searchKeyword);
} else {
    $jobs = $job->getAllJobs();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/job.css">
    <title>Job | Job Vacancy</title>
    <script>
        // Clear search when page is refreshed
        window.onload = function () {
            if (performance.navigation.type === 1) {
                window.location.href = "job.php";  // Redirect to clear search params
            }
        };
    </script>
</head>
<body>

    <!-- Navigation Section -->
    <nav class="nav-parent-container">
        <nav class="nav-container">
            <div class="nav-upper-container">
                <div>Job Vacancy</div>
                <a href="/view/profile.php">
                    <img class="nav-profile-container" src="https://images.ctfassets.net/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=1200&h=992&fl=progressive&q=70&fm=jpg" alt="">
                </a>
            </div>
            <div class="nav-link-container">
                <a href="/view/job.php">Job</a>
                <a href="/view/internship.php">Internship</a>
            </div>
        </nav>

        <!-- Search Bar -->
        <form class="nav-action-container" method="GET" action="job.php">
            <input type="text" name="search" class="search-input" placeholder="Search for jobs..." value="<?= htmlspecialchars($searchKeyword); ?>">
            <button type="submit" class="search-button">Search</button>
        </form>
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
                        <a href="job_detail.php?id=<?= $job['id']; ?>" class="apply-button">Apply Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No job listings found for "<strong><?= htmlspecialchars($searchKeyword); ?></strong>".</p>
        <?php endif; ?>

    </section>

</body>
</html>
