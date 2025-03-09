<?php
require_once __DIR__ . '../../model/internship.php';
$internship = new Internship();
$internships = $internship->getAllInternships(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/job.css">
    <title>Internship | Job Vacancy</title>
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
    </nav>

    <!-- Internship Listings Section -->
    <section class="job-listings">
        <h2>Available Internships</h2>

        <?php if (!empty($internships)): ?>
            <?php foreach ($internships as $internship): ?>
                <div class="job-card">
                    <div class="job-header">
                        <div class="job-info">
                            <h3><?= htmlspecialchars($internship["title"]); ?></h3>
                            <p><?= htmlspecialchars($internship["location"]); ?></p>
                        </div>
                    </div>
                    <p class="job-description">
                        <?= htmlspecialchars(substr($internship["description"], 0, 100)); ?>...
                    </p>
                    <span class="duration"><?= htmlspecialchars($internship["duration"]); ?> months</span>
                    <div class="job-footer">
                        <span class="salary">IDR <?= number_format($internship["salary"], 0, ',', '.'); ?></span>
                        <a href="internship_detail.php?id=<?= $internship['id']; ?>" class="apply-button">Apply Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No internship listings available.</p>
        <?php endif; ?>

    </section>

    <!-- Footer Section -->
    <footer class="footer-container">
        <div class="footer-content">
            <p>&copy; <?= date('Y'); ?> Job Vacancy. All rights reserved.</p>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Us</a>
            </div>
        </div>
    </footer>

</body>
</html>
