<?php
include_once('process/settings.php');
include_once('process/functions.php');


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = getUserData($conn);
?>

<style>
  /* NAVBAR */
    header{
        position: sticky;
        top: 0;   
    }

    .header-container{
        background-color: var(--lavender);
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 30px;
        align-items: center;
        overflow: hidden;
        cursor: default;
    }

    .navbar{
        overflow: hidden;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .navbar a{
        padding: 14px 10px;
        margin-left: 7px;
        background-color: var(--purple);
        color: var(--lavender);
        font-size: var(--fz-normal);
        text-decoration: none;
        font-family: var(--title);
    }


    .navbar a:hover{
        opacity: 0.5;
        cursor: pointer;
    }

    .navbar .decoration{
        margin-inline: 10px;
    }

    .navbar .divider-line{
        padding: 19px 5px;
        color: var(--purple);
    }

    .navbar .divider-line:hover{
        opacity: 1;
        cursor: default;
    }

    .brand{
        display: flex;
        flex-direction: row;
        color: var(--purple);
        font-size: var(--fz-title);
        font-family: var(--title);
        margin-left: 10px;
    }

    header img{
        width: 25px;
        height: 25px;
    }

    #profile-widget {
        display: none; /* hidden by default */
        position: absolute;
        top: 35px;
        right: 2%;
        max-width: 350px;
        background: var(--lavender);
        padding: 2%;
        border: 1px solid var(--purple);
        border-radius: 10px;
        box-shadow: 4px 4px 0 var(--purple);    
    }

    #profile-header{
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 4%;
    }
    #profile-header img{
        width: 40px;
        height: 40px;
    }
    .btn-row, .btn-col{
        transform: translateX(-8px);
    }
    hr{
        height: 3px;
        background-color: var(--purple);
        border: none;
        margin-block: 5%;
    }
    #theme-btn{
        background: linear-gradient(-45deg, var(--lavender) 40%, var(--light-purple) 30%);
        color: var(--white);
    }

</style>

<!-- STICKY AVBAR -->
<header>
    <div class="header-container">
        <div class="brand">
            <img class="logo" src="images/The_blog_logo.png" alt="Logo">
            <h3>The "Blog"</h3>
        </div>
        <nav class="navbar">
            <div class="decoration">
                <a href="#" class="divider-line">.</a>
                <a href="#" class="divider-line">.</a>
            </div>
            <a href="index.php"><i class="fa-solid fa-house"></i></a> <!-- Home -->
            <a href="#"><i class="fa-solid fa-user-group"></i></a> <!-- Friend/Group -->
            <a href="#"><i class="fa-solid fa-bell"></i></a> <!-- Notification -->
            <a href="javascript:void(0);" onclick="open_widget()"> <!-- Profile -->
                <?php if (!isset($_SESSION['username']) || !$user): ?>
                <!-- GUEST VIEW -->
                <i class="fa-solid fa-circle-user"></i>
                <?php else: ?>
                <!-- LOGGED VIEW -->
                <img src="" alt="">
                <?php endif; ?>
            </a>
        </nav>
    </div>
    <div id="profile-widget" class="">
        <?php if (!isset($_SESSION['username']) || !$user): ?>
            <!-- GUEST VIEW -->
            <section>
                <h3>You're using Guest Account</h3>
                <p>Login right now to see your profile and get access to other features!</p>
                <form action="login.php">
                    <button type="submit" class="primary-btn">Login</button>
                </form>
            </section>

        <?php else: ?>
            <!-- LOGGED VIEW -->
            <figure id="profile-header">
                <img src="" alt="">
                <figcaption>
                    <?= $user['display_username'] ?? ''; ?>
                    <h4>@<?= $user['username'] ?? ''; ?></h4>
                </figcaption>
            </figure>
            <div class="btn-row">
                <form action="profile.php">
                    <button type="submit" class="primary-btn">View Profile</button>
                </form>
                <form action="process/logout.php">
                    <button type="submit" class="secondary-btn">Logout</button>
                </form>
            </div>
            <hr>
            <div class="btn-col">
                <button class="long-btn">Setting</button>
                <button class="long-btn" id="theme-btn">Switch Theme</button>
            </div>

        <?php endif; ?>

    </div>
</header>

<script>
function open_widget() {
  var x = document.getElementById("profile-widget");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>