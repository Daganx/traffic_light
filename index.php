<?php
include_once('environment.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="icon" type="image/svg" sizes="32x32" href="./assets/images/pngFeu.svg">
    <title>RED LIGHT REDEMPTION</title>
</head>

<body>
    <!-- HEADER -->
    <header id="index_top">
        <section id="header_left">
            <div class="login_block">
                <?php if (isset($_SESSION['role'])): ?>
                    <?php if ($_SESSION['role'] == 'ADMIN'): ?>
                        <li><a href="admin/index.php">Gestion administrateur</a></li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!isset($_SESSION['userName'])) { ?>
                    <li><a href="registrer.php">Registrer</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php } else { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>

            </div>
            <div class="header_text">
                <h1><span class="header_text_span">"</span><a href="lighttraffic.php">THE PLACE TO STOP ! <span
                            class="header_text_span_2">"</span></h1>
                <p><a href="addlighttraffic.php">ADD YOUR OWN TRAFFIC LIGHT !</a></p>
            </div>
        </section>
        <section id="header_right">
            <img src="" alt="">
        </section>
    </header>

    <section id="header_banner">
        <div class="banner_text">
            <p><a href="lighttraffic.php"></a>EXPLORE THE COMMUNITY COLLECTION</p>
        </div>
    </section>
    <!-- FIN DU HEADER -->
    <!-- DISPLAY LIGHT TRAFFIC -->
    <section id="gallery_container">
        <div class="gallery_left_container">
            <div class="left_container_top">
                <div class="left_top_first_picture">
                    <img src="" alt="">
                </div>
                <div class="left_top_second_picture">
                    <img src="" alt="">
                </div>
            </div>

            <div class="left_container_bottom">
                <div class="left_bottom_first_picture">
                    <img src="" alt="">
                </div>
                <div class="left_bottom_second_picture">
                    <img src="" alt="">
                </div>
            </div>
        </div>

        <div class="gallery_right_container">
            <div class="right_picture">
                <img src="" alt="">
            </div>
        </div>
    </section>

    <!-- FIN SECTION GALLERY -->

    <!-- BANNER FOOTER -->
    <footer>
        <section id="header_banner_footer">
            <div class="banner_text_footer">
                <p>JOIN THE OFFICIAL COMMUNITY OF THE TRAFFIC LIGHT ENJOYER !</p>
            </div>
        </section>
    </footer>
</body>

</html>