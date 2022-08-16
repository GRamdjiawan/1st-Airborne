<?php
    session_start();

    if(isset($_SESSION["loggedIn"])) {
        if(isset($_POST["yes"])) {
            session_destroy();
            header("Location: ../login.php");
        } 
    
    } else {
        $_SESSION["failedLogin"] = true ;
        header("Location: ../login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gianni Ramdjiawan">
    <link rel="icon" href="../../img/favicon.ico" type="image/jpg">
    <title>1st Airborne: Hell let Loose clan</title>
    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"
        defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/main.js" defer></script>
</head>
<body>
    <?php
        include_once("../../templates/admin/header.php");
    ?>
    <div class="container-fluid   p-5" style="
        background-image: url(../../img/bg/home.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 80vh;
    ">
        <div class="row h-100 " >
            <div class="col-md-2"></div>
            <div class="col-md-8 d-flex flex-column justify-content-center ">
                <h3 class="text-center" style="color: white !important;">
                Do you want to log out?
            </h3>
                <form action="" method="post" class="row">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="submit" name="yes" class="btn btn-success">Yes</button>
                        <a href="./home.php" class="btn btn-danger">No</a>
                    </div>
        
                </form>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php
        include_once("../../templates/admin/footer.php");
    ?>
</body>
</html>