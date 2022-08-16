<?php
    session_start();
    include_once("./dbConnection.php");

    if (isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        $user = $db->prepare("SELECT * FROM users WHERE username = :username");
        $user->bindParam("username", $username);
        $user->execute();
        $data = $user->fetch(PDO::FETCH_ASSOC);
        $verifyPassword = password_verify($password, $data["password"]);
        
        if (!$data) {
            $gebruikerBestaat = false;
        } else if ($data)  {
            if($verifyPassword){
                $_SESSION['loggedIn'] = $data['id'];
                $gebruikerBestaat = true;
            } else {
                $gebruikerBestaat = false;
            }
        } else {
            $gebruikerBestaat = false;
        }
        
        if (($username == '') ||($password == ''))  {
            $loginStatus = 'danger';
            $loginMessage = 'Invalid input, fill in everything';
        } else if (($gebruikerBestaat)) {
            $loginStatus = 'success';
            $loginMessage = 'Ingelogd';
            header("Location: ./loggedIn_pages/home.php");
        } else{
            $loginStatus = 'danger';
            $loginMessage = 'User does not exist';
            $username = '';
            $password = '';
        }

    } else {
        $username = '';
        $password = '';
        $loginMessage = '';
        $loginStatus = '';
    }

    if (isset($_SESSION["failedLogin"])){
        $loginStatus = 'danger';
        $loginMessage = 'Failed login attempt';
        unset($_SESSION["failedLogin"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gianni Ramdjiawan">
    <link rel="icon" href="../img/favicon.ico" type="image/jpg">
    <title>1st Airborne: Hell let Loose clan</title>
    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"
        defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js" defer></script>
</head>
<body>
    <?php
        include_once("../templates/php/header.php");
    ?>
    <div class="container-fluid login-page p-5" style="
        background-image: url(../img/bg/home.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 80vh;
    ">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="form-floating mt-5 mb-3">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="floatingInput" 
                            placeholder="Username" 
                            name="username"
                            value="<?=$username?>"
                        >
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input 
                            type="password" 
                            class="form-control" 
                            id="floatingPassword" 
                            placeholder="Password" 
                            name="password"
                        >
                        <label for="floatingPassword">Password</label>
                    </div>
                    <input 
                        type="submit" 
                        name="login" 
                        class="btn mt-3 mb-5" 
                        value="Login"
                        style="
                            background-color: #901010;
                            color: white;
                        "
                    >
                </form>
                    <div class="alert alert-<?=$loginStatus?> alert-dismissible fade show" role="alert">
                         <?=$loginMessage?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php
        include_once("../templates/footer.php");
    ?>
</body>
</html>