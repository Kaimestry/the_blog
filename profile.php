<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- ICONS FROM FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- CSS LINKING -->
    <link rel="stylesheet" href="style/style.css"> <!-- Main -->
    <link rel="stylesheet" href="style/profile.css"> <!-- Specific webpage -->
</head>
<body>
    <!-- STICKY AVBAR -->
    <?php include "elements/navbar.php"?>

    <div class="container">
        <section class="small-container profile">
            <h2 class="container-title">PROFILE</h2>
            <div class="container-content profile-content">
                <div class="content-group profile-header">
                    <figure>
                        <img src="" alt="" class="userxxxxxxxxx-pfp">
                    </figure>
                    <div class="content">
                        <h3 class="group-title"><span class="text-bold">USERNAME: </span><span>something</span></h3>
                        <h3 class="group-title"><span class="text-bold">JOINED SINCE: </span><span>July 19 2025</span></h3>
                    </div>
                    <button class="icon-btn" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                </div>
                <div class="content-group profile-popularity">
                    <h3 class="group-title"><span class="text-bold">POST: </span><span>15</span></h3>
                    <h3 class="group-title"><span class="text-bold">FOLLOWER: </span><span>15</span></h3>
                    <h3 class="group-title"><span class="text-bold">FOLLOWING: </span><span>15</span></h3>
                </div>
                <div class="content-group profile-bio">
                    <p>akjsdhfkahsdfklhaskjdfhklhasdfasdfasdf
                        ajskdhflkahsdkfhklashdflasdfasdfasdfasdf
                        kjasdhfkljahskdhfklahskdlfhasdfasadfasdfas
                        ajsjdhfjkhaskdhflkhsadfkjhlaasdfasdfasdfdf
                    </p>
                </div>
            </div>
        </section>
        <!-- <section class="small-container profile-wall">
            <h2 class="container-title">Post</h2>
        </section> -->
    </div>
</body>
</html>