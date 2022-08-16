<?php
    session_start();
    include_once("../../dbConnection.php");

    function checkClipFile($clip) {
        $clipType = $clip['type'];
        if($clipType == 'video/mp4') return true;
        
    }
    function checkGifFile($gif) {
        $gifType = $gif['type'];
        if($gifType == 'image/gif') return true;
    }

    if(isset($_SESSION["loggedIn"])) {
        if(isset($_POST["add"])) {
            $clip = $_FILES["clip"];
            $gif = $_FILES["gif"];

            if (($clip == '') ||($gif == ''))  {
                $errorStatus = 'danger';
                $errorMessage = 'Invalid input, fill in everything';
                
            }  else if(checkClipFile($clip) && checkGifFile($gif)){
                $clipName = $clip['name'];
                $clipDir = '1sta-clan.com/www/media'.$clip['name'];
                move_uploaded_file($clip['tmp_name'],$clipDir);
                
                $gifName = $gif['name'];
                $gifDir = '1sta-clan.com/www/img/gifs/'.$gif['name'];
                move_uploaded_file($gif['tmp_name'],$gifDir);
                
                $insertClip = $db->prepare(
                    "INSERT INTO clips (clip, gif) VALUES (:clip, :gif)"
                );
                
                $insertClip->bindParam("clip", $clipName);
                $insertClip->bindParam("gif", $gifName);
                
                if($insertClip->execute()) {
                    $errorStatus = 'success';
                    $errorMessage = 'Clip added';
                    $clip = '';
                    $gif = '';
                    
                    
                } else {
                    echo "An error occured";
                }
                
            } else {
                $errorStatus = 'danger';
                $errorMessage = 'Wrong media type, mp4 and gif';
                
            }
            
        } else {
            $clip = '';
            $gif = '';
            $clipType = '';
            $gifType = '';
            $errorStatus = '';
            $errorMessage = '';

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
    <link rel="icon" href="../../../img/favicon.ico" type="image/jpg">
    <title>1st Airborne: Hell let Loose clan</title>
    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"
        defer></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../../../css/style.css">
</head>

<body>
    <div class="container-fluid header" id="start">
        <div class="row nav-row">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../home.php">
                        <div class="logo-container">
                            <img src="../../../img/logo-1stA.png" class="img-fluid logo" alt="1sta 1st-airborne">
                            <div class="flag-container">
                                <img src="../../../img/netherlands.png" alt="1sta 1st-airborne" class="flags">
                                <img src="../../../img/belgium.png" alt="1sta 1st-airborne" class="flags">
                                <img src="../../../img/union jack.png" alt="1sta 1st-airborne" class="flags union-jack">
                            </div>
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../home.php">
                                   Home
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                   Edit clips
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle" style="color: white; font-size: 25 pt;"></i> 

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li>
                                        <a class="dropdown-item" 
                                            href="../log_out.php">Log Out</a>
                                    </li>
                                </ul>
                            </li>    
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-center align-items-center flex-column p-5" style="
        background-image: url(../../../img/bg/home.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 80vh;
    ">

        <form action="" method="post" enctype="multipart/form-data" class="my-3">

            <div class="row mb-3">
                <div class=" mb-3">
                    <label for="formFile" class="form-label">Add clip here: </label>
                    <input class="form-control" type="file" id="formFile" name="clip">
                </div>  
                <div class=" mb-3">
                    <label for="formFile" class="form-label">Add gif here: </label>
                    <input class="form-control" type="file" id="formFile" name="gif">
                </div>  
            </div>
            
            <button type="submit" name="add" class="btn btn-success">
                <i class="bi bi-plus-lg"></i>
            </button>
        </form>

        <div class="alert alert-<?=$errorStatus?> alert-dismissible fade show" role="alert">
            <?=$errorMessage?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       
    </div>
    <?php 
        include_once("../../../templates/admin/footer.php");
    ?>
   
</body>

</html>