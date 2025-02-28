<?php
require_once __DIR__ . '../../model/internship.php';
require_once __DIR__ . '../../model/internship_applicant.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Internship ID is missing!");
}

$internshipId = intval($_GET['id']);
$internshipModel = new Internship();
$internshipApplicant = new InternshipApplicant();
$internship = $internshipModel->getInternshipById($internshipId);

if (!$internship) {
    die("Internship not found!");
}

// Handle internship application submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $notes = trim($_POST['notes']);

    if (empty($email) || empty($notes)) {
        $message = "Both fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format!";
    } else {
        if ($internshipApplicant->applyForInternship($internshipId, $email, $notes)) {
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
    <link rel="stylesheet" href="../style/internship_detail.css">
    <title><?= htmlspecialchars($internship["title"]); ?> | Internship Details</title>
</head>
<body>

    <!-- Internship Detail Section -->
    <section class="internship-detail">
        <h2><?= htmlspecialchars($internship["title"]); ?></h2>
        <p><strong>Location:</strong> <?= htmlspecialchars($internship["location"]); ?></p>
        <p><strong>Division:</strong> <?= htmlspecialchars($internship["division"]); ?></p>
        <p><strong>Duration:</strong> <?= htmlspecialchars($internship["duration"]); ?> months</p>
        <p><strong>Salary:</strong> IDR <?= number_format($internship["salary"], 0, ',', '.'); ?></p>
        <p class="internship-description"><?= nl2br(htmlspecialchars($internship["description"])); ?></p>

        <!-- Display success/error message -->
        <?php if (!empty($message)): ?>
            <p class="message"><?= htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <!-- Internship Application Form -->
        <form method="POST" class="internship-application-form">
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="notes">Cover Letter / Notes:</label>
            <textarea name="notes" id="notes" rows="4" required></textarea>

            <button type="submit" class="apply-button">Submit Application</button>
        </form>

        <a href="internship.php" class="back-link">← Back to Internship Listings</a>
    </section>

</body>
</html>
