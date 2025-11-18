<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ICONS FROM FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- CSS LINKING -->
    <link rel="stylesheet" href="style/style.css"> <!-- Main -->
    <link rel="stylesheet" href="style/input.css"> <!-- input -->
</head>
<body>
    <!-- STICKY AVBAR -->
    <?php include "elements/navbar.php" ?>

    <!-- SIGN UP FORM -->
    <div class="form-container">
        <form class="signup-form" method="post" action="login.php">
            <h3>LOGIN</h3>

            <div class="input-form">
                <label for="username">Username</label>
                <input type="text" id="username" class="flash-error">
                <span class="flash-msg-error">Username is already taken!</span>
            </div>

            <div class="input-form">
                <label for="password">Password</label>
                <input type="password" id="password">
                <span class="flash-msg-error">Password is too short!</span>
            </div>

            <button type="submit" class="primary-btn">Sign Up</button>
            <p>Don't an account? <a href="signup.php">Sign Up Here!</a></p>
        </form>
    </div>
</body>
</html>