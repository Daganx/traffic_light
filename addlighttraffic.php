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
                    <label for="city">City</label>
                    <input type="text" name="city" id="city">
                </div>
                <div class="country_add">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country">
                </div>
                <div class="coordinate_add">
                    <label for="coordinate">Coordinate</label>
                    <input type="text" name="coordinate" id="coordinate">
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