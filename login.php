<?php
include_once('environment.php');

// ON VERIFIE SI LES CHAMPS SONT REMPLIS ET PAS VIDE
if (isset($_POST['name']) && (isset($_POST['password']))) {
    if (!empty($_POST['name']) && (!empty($_POST['password']))) {
        $username = htmlspecialchars(trim(strtolower($_POST['name'])));
        $password = htmlspecialchars(trim($_POST['password']));
        $passwordCrypt = sha1(sha1('123' . $password . 'kpkoazf1516'));

        //VERIFICATION SI LE MOT DE PASSE EST CORRECT
        $request = $bdd->prepare('SELECT * 
                                FROM users
                                WHERE username = ?');

        $request->execute(array($username));

        while ($userData = $request->fetch()) {
            if ($passwordCrypt == $userData['password']) {
                $_SESSION['userName'] = $userData['username'];
                $_SESSION['userId'] = $userData['id'];
                $_SESSION['role'] = $userData['role'];
                header('Location:index.php?successconnect=1');
            } else {
                header('Location:login.php?errorconnect=1');
                //ERREUR MOT DE PASSE FAUX
            }
        }
    } else {
        header('Location:login.php?errorconnect=2');
        //ERREUR CHAMP VIDE
    }
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
    <section id="login_container">
        <div class="login_left">
            <img src="" alt="">
        </div>
        <div class="login_right">
            <div class="login_title">
                <p>JOIN THE COMMUNITY</p>
            </div>
            <form class="login_form" action="login.php" method="POST">
                <div class="login_form_name">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="login_form_password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <button>Confirm</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>