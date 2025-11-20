<?php include_once('process/settings.php');

$errors = [
    'username' => '',
    'email' => '',
    'password' => ''
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get input safely
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    $raw_password = $_POST['password'];

    // Check if username registered
    $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check_username) == 0) {
        $errors['username'] = "Can't find account with: '" . $username . "'";
    };

    //check if password matches with existing username
    if (mysqli_num_rows($check_username) > 0) {
        $row = mysqli_fetch_assoc($check_username);
        if (!password_verify($raw_password, $row['password'])) {
            $errors['password'] = "Invalid password";
        } else {
            // Start session after successful login
            session_start();
            $_SESSION['username'] = $row['username'];         
            header("Location: index.php");
            exit();
        }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
                <input type="text" id="username" name="username"
                    placeholder="Username"
                    class="<?= !empty($errors['username']) ? 'flash-error' : '' ?>"
                    value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

                <?php if (!empty($errors['username'])): ?>
                    <span class="flash-msg-error"><i class="fa-regular fa-circle-xmark"></i> <?= $errors['username'] ?></span>
                <?php endif; ?>            
            </div>

            <div class="input-form">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                    placeholder="Password"
                    class="<?= !empty($errors['password']) ? 'flash-error' : '' ?>"
                    value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">

                <?php if (!empty($errors['password'])): ?>
                    <span class="flash-msg-error"><i class="fa-regular fa-circle-xmark"></i> <?= $errors['password'] ?></span>
                <?php endif; ?>            
            </div>

            <button type="submit" class="primary-btn">Sign Up</button>
            <p>Don't an account? <a href="signup.php">Sign Up Here!</a></p>
        </form>
    </div>
</body>
</html>