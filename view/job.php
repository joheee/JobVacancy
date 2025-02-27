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
                <div>Login</div>
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

        <!-- Job Card -->
        <div class="job-card">
            <div class="job-header">
                <div class="job-info">
                    <h3>Software Engineer</h3>
                    <p>Google - San Francisco, CA</p>
                </div>
            </div>
            <p class="job-description">We are looking for a Software Engineer with experience in building high-performance web applications.</p>
            <div class="job-footer">
                <span class="salary">$120,000 - $150,000/year</span>
                <button class="apply-button">Apply Now</button>
            </div>
        </div>

        <!-- Another Job Card -->
        <div class="job-card">
            <div class="job-header">
                <div class="job-info">
                    <h3>UI/UX Designer</h3>
                    <p>Facebook - New York, NY</p>
                </div>
            </div>
            <p class="job-description">Looking for a UI/UX designer to create engaging user experiences for mobile and web platforms.</p>
            <div class="job-footer">
                <span class="salary">$90,000 - $110,000/year</span>
                <button class="apply-button">Apply Now</button>
            </div>
        </div>

    </section>

</body>
</html>
