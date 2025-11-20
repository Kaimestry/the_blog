<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
        width: 300px;
        background: var(--lavender);
        padding: 2%;
        border: 1px solid var(--purple);
        border-radius: 10px;
        box-shadow: 4px 4px 0 var(--purple);    

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
                    <img src="" alt="">
                </a>
            </nav>
        </div>
        <div id="profile-widget" class="">
            <?php
            // Check if the user is logged in
            if (!isset($_SESSION['email'])) {
                //Guest view -> Login
                echo "<figure>";
                echo "<img src='' alt=''>";
                echo "</figure>";
                echo "<section>";
                echo "<h3>Guest Account</h3>";
                echo "<p>Login to get access to more feature</p>";
                echo "<form action='login.php'>";
                echo "<button type='submit' class='primary-btn'>Login</button>";
                echo "</form>";
                echo "</section> ";
            }else{
                //Logged view -> Can go to profile edits
                echo "<figure>";
                echo "<img src='' alt=''>";
                echo "</figure>";
                echo "<section>";
                echo "<h3>" . ($_SESSION['username']) . "</h3>";
                echo "<p>Something About profile ig</p>";
                echo "<form action='profile.php'>";
                echo "<button type='submit' class='primary-btn'>View Profile</button>";
                echo "</form>";
                echo "</section> ";
            }
            ?>
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