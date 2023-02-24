<?php
include_once('environment.php');

$request = $bdd->query('SELECT *,users.username AS author,  articles.id AS articlesid
                        FROM articles
                        LEFT JOIN users ON users_id = users.id');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/svg" sizes="32x32" href="./assets/images/pngFeu.svg">
    <title>RED LIGHT REDEMPTION</title>
</head>

<body>
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
            <div class="header_text header_text_traffic">
                <h1>ADD YOUR OWN TRAFFIC LIGHT HERE !</h1>
                <p>
                    <a href="addlighttraffic.php">CLICK HERE TO ADD YOURS !</a>
                </p>
            </div>
        </section>
        <section id="header_right">
            <img src="" alt="">
        </section>
    </header>

    <!-- FIN DU HEADER -->
    <!-- BANNER -->

    <section id="header_banner_text">
        <div class="banner_text">
            <p>EXPLORE THE COMMUNITY COLLECTION</p>
        </div>
    </section>

    <!-- FIN BANNER -->

    <section id="gallery_container_lt">
        <?php while ($articles = $request->fetch()): ?>
            <!-- <?php
            // var_dump($articles)
            ?> -->
            <article id="articles_container">
                <div class="article_container">
                    <img style="object-fit: cover;" class="upload_image"
                        src="assets/images/upload/<?= $articles['image']; ?>" alt="image de <?= $articles['cityname']; ?>">
                    <div class="info_article">
                        <h3 class="cityname_title">
                            <?= $articles['cityname']; ?>
                        </h3>
                        <p class="country_title">
                            <?= $articles['countryname']; ?>
                        </p>
                        <p class="coordonate_title">
                            <?= $articles['coordonate']; ?>
                        </p>
                    </div>
                </div>
                <!-- ON VERIFIE SI LA VARIABLE DE SESSION EXISTE-->
                <?php if (isset($_SESSION['userId'])): ?>
                <?php endif ?>
            </article>
        <?php endwhile ?>
    </section>

    <!-- FIN GALLERY -->
    <!-- BANNER COMMENTS -->
    <section id="header_banner_text">
        <div class="banner_text">
            <p>SHARE A COMMENTS WITH US !</p>
        </div>
    </section>
    <!-- FIN BANNER -->
    <!-- SECTION COMMENTS -->
    <section id="comments_container">
        <div class="comments_title">
            <p>LEAVE A COMMENT</p>
        </div>
        <div class="comments_section">
            <input type="text" placeholder="Type your comment...">
            <button class="button-17" role="button">Share</button>
        </div>
        <div class="comments_list_title">
            <p>LIST OF COMMENTS</p>
        </div>
        <div class="">
            <p>1</p>
            <p>2</p>
            <p>3</p>
        </div>
    </section>
</body>

</html>