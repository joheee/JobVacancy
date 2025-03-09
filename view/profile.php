<?php
$user = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'profile_picture' => 'https://images.ctfassets.net/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=1200&h=992&fl=progressive&q=70&fm=jpg'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($user['name']) ?> | Profile</title>
    <link rel="stylesheet" href="../style/profile.css">
</head>
<body>

    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-image">
                <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <h2><?= htmlspecialchars($user['name']) ?></h2>
                <p><?= htmlspecialchars($user['email']) ?></p>
            </div>
        </div>
    </div>

</body>
</html>
