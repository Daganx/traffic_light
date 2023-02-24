<?php
include_once('environment.php');

if (!isset($_SESSION['userName'])) {
    header('Location:index.php');
}

if (isset($_POST['cityname']) && isset($_POST['countryname']) && isset($_POST['coordonate'])) {
    $cityname = htmlspecialchars($_POST['cityname']);
    $countryname = htmlspecialchars($_POST['countryname']);
    $coordonate = htmlspecialchars($_POST['coordonate']);

    if (isset($_FILES['image'])) {
        // NOM DU FICHIER IMAGE
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name']; // NOM TEMPORAIRE DU FICHIER IMAGE
        $infoImage = pathinfo($image); //TABLEAU QUI DECORTIQUE LE NOM DE FICHIER
        $extImage = $infoImage['extension']; //EXTENSION 
        $imageName = $infoImage['filename']; //NOM DU FICHIER SANS L'EXTENSION
        //GENERATION D'UN NOM DE FICHIER UNIQUE
        $uniqueName = $imageName . time() . rand(1, 1000) . "." . $extImage;

        move_uploaded_file($imageTmp, 'assets/images/upload/' . $uniqueName);
    }

    $request = $bdd->prepare('INSERT INTO articles(cityname,countryname,coordonate,image,users_id) 
                             VALUES(?,?,?,?,?)');

    $request->execute(array($cityname, $countryname, $coordonate, $uniqueName, $_SESSION['userId']));
    header('Location: lighttraffic.php?success=1');
}
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
    <!-- SESSION FORM -->
    <section id="form_creation_container">
        <div class="form_left">
            <img src="" alt="">
            <p class="form_share">SHARE YOUR POST</p>
        </div>
        <div class="form_right">
            <form class="form_add" action="addlighttraffic.php" method="POST" enctype="multipart/form-data">
                <div class="city_add">
                    <label for="cityname">City</label>
                    <input type="text" name="cityname" id="cityname">
                </div>
                <div class="country_add">
                    <label for="countryname">Country</label>
                    <input type="text" name="countryname" id="countryname">
                </div>
                <div class="coordonate_add">
                    <label for="coordonate">Coordonate</label>
                    <input type="text" name="coordonate" id="coordonate">
                </div>
                <div class="image_add">
                    <label for="image" class="displayNone"></label>
                    <input type="file" id="image" name="image">
                </div>
                <div>
                    <button>Add</button>
                </div>
            </form>
    </section>
</body>

</html>