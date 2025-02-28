<?php
require_once __DIR__ . '../../model/job.php';
require_once __DIR__ . '../../model/job_applicant.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Job ID is missing!");
}

$jobId = intval($_GET['id']);
$jobModel = new Job();
$jobApplicant = new JobApplicant();
$job = $jobModel->getJobById($jobId);

if (!$job) {
    die("Job not found!");
}

// Handle job application submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $notes = trim($_POST['notes']);

    if (empty($email) || empty($notes)) {
        $message = "Both fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format!";
    } else {
        if ($jobApplicant->applyForJob($jobId, $email, $notes)) {
            $message = "Application submitted successfully!";
        } else {
            $message = "Error submitting application!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/job_detail.css">
    <title><?= htmlspecialchars($job["title"]); ?> | Job Details</title>
</head>
<body>

    <!-- Job Detail Section -->
    <section class="job-detail">
        <h2><?= htmlspecialchars($job["title"]); ?></h2>
        <p><strong>Location:</strong> <?= htmlspecialchars($job["location"]); ?></p>
        <p><strong>Division:</strong> <?= htmlspecialchars($job["division"]); ?></p>
        <p><strong>Category:</strong> <?= htmlspecialchars($job["category"]); ?></p>
        <p><strong>Salary:</strong> IDR <?= number_format($job["salary"], 0, ',', '.'); ?></p>
        <p class="job-description"><?= nl2br(htmlspecialchars($job["description"])); ?></p>

        <!-- Display success/error message -->
        <?php if (!empty($message)): ?>
            <p class="message"><?= htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <!-- Job Application Form -->
        <form method="POST" class="job-application-form">
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="notes">Cover Letter / Notes:</label>
            <textarea name="notes" id="notes" rows="4" required></textarea>

            <button type="submit" class="apply-button">Submit Application</button>
        </form>

        <a href="job.php" class="back-link">← Back to Job Listings</a>
    </section>

</body>
</html>
