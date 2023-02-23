<?php
include_once('environment.php');

if (isset($_POST['name']) && (isset($_POST['password'])) && (isset($_POST['passwordConfirm']))) {
    $username = htmlspecialchars(trim(strtolower($_POST['name'])));
    $password = htmlspecialchars(trim($_POST['password']));
    $role = 'USER';

    $passwordConfirm = htmlspecialchars(trim($_POST['passwordConfirm']));

    //Verification des champs de mot de passe et confirmation de mdp
    if ($password == $passwordConfirm) {
        // VERIFICATION SI UTILISATEUR DEJA EXISTANT EN BDD

        $rqCount = $bdd->prepare('  SELECT COUNT(*) AS usercount
                                    FROM users
                                    WHERE username = ?');

        $rqCount->execute([$username]);

        while ($count = $rqCount->fetch()) {
            $countVerify = $count['usercount'];

            if ($countVerify < 1) {
                //ENCRYPTAGE DU MOT DE PASSE
                $passwordCrypt = sha1(sha1('123' . $password . 'kpkoazf1516'));

                $request = $bdd->prepare('  INSERT INTO users(username,password,role)
                                            VALUES(?,?,?)');

                $request->execute(array($username, $passwordCrypt, $role));
                header('Location:login.php?successsubscribe=1');
            } else {
                header('Location:registrer.php?userexist=1');
            }
        }
    } else {
        header('Location:registrer.php?passworderror=1');
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
    <section id="registrer_container">
        <div class="registrer_left">
            <img src="" alt="">
        </div>
        <div class="registrer_right">
            <div class="registrer_title">
                <p>JOIN THE COMMUNITY</p>
            </div>
            <form class="registrer_form" action="registrer.php" method="POST">
                <div class="registrer_form_name">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="registrer_form_password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="registrer_form_confirm">
                    <label for="passwordConfirm">Conf.Password</label>
                    <input type="password" name="passwordConfirm" id="passwordConfirm">
                </div>
                <button>Confirm</button>
            </form>
        </div>
    </section>
</body>

</html>