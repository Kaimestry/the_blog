<?php include_once('process/settings.php');

$errors = [
    'username' => '',
    'email' => '',
    'general' => ''
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get input safely
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $raw_password = $_POST['password'];
    $hashed_pass = password_hash($raw_password, PASSWORD_DEFAULT);

    // Check username
    $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check_username) > 0) {
        $errors['username'] = "Username '$username' is already taken.";
    }

    // Check email
    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $errors['email'] = "This email is already registered.";
    }

    // If no errors, insert user
    if (!array_filter($errors)) {
        $query = "INSERT INTO users (username, email, password)
                  VALUES ('$username', '$email', '$hashed_pass')";

        if (mysqli_query($conn, $query)) {
            header("Location: index.php");
            exit();
        } else {
            $errors['general'] = "Database error, try again.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ICONS FROM FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- CSS LINKING -->
    <link rel="stylesheet" href="style/style.css"> <!-- Main -->
    <link rel="stylesheet" href="style/input.css"> <!-- Main -->
</head>
<body>
    <!-- STICKY AVBAR -->
    <?php include "elements/navbar.php" ?>

    <!-- SIGN UP FORM -->
    <div class="form-container">
        <form class="signup-form" method="post" action="signup.php">
            <h3>SIGN UP</h3>

            <div class="input-form">
                <label for="username"><i class="fa-solid fa-user"></i>
                    Username
                </label>
                <input type="text" id="username" name="username"
                    class="<?= !empty($errors['username']) ? 'flash-error' : '' ?>"
                    value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

                <?php if (!empty($errors['username'])): ?>
                    <span class="flash-msg-error"><i class="fa-regular fa-circle-xmark"></i> <?= $errors['username'] ?></span>
                <?php endif; ?>
            </div>

            <div class="input-form">
                <label for="email"><i class="fa-solid fa-at"></i>
                    Email
                </label>
                <input type="email" id="email" name="email"
                    class="<?= !empty($errors['email']) ? 'flash-error' : '' ?>"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

                <?php if (!empty($errors['email'])): ?>
                    <span class="flash-msg-error"><i class="fa-regular fa-circle-xmark"></i> <?= $errors['email'] ?></span>
                <?php endif; ?>
            </div>

            <div class="input-form">
                <label for="password"><i class="fa-solid fa-lock"></i> 
                    Password
                </label>
                <input type="password" id="password" name="password" minlength="4">
            </div>

            <button type="submit" class="primary-btn">Sign Up</button>
            <p>Have an account? <a href="login.php">Login Here!</a></p>
        </form>
    </div>
</body>
</html>