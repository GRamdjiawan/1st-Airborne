<?php
    include_once("./php/dbConnection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gianni Ramdjiawan">
    <meta name="description" content="We are a friendly community where 
    everybody is welcome. We are the [1stA] 1st Airborne clan, 
    an inclusive Hell let Loose clan that our top priority is having 
    fun and treat each other with respect">
    <meta name="keywords" content="  
    google,
    youtube,
    1st Airborne,
    1st Airborne clan,
    1stA,
    1stA-clan,
    1stA-clan.com,
    first Airborne,
    first airborne clan,
    hell let loose,
    Hell Let Loose,
    Hell let loose,
    Hell Let loose,
    hell let loose,
    clan hell loose,
    hell let loose clan,
    hell let loose clans,
    hell let loose community,
    hll,
    HLL,
    squad line battle,
    SLB,
    counter strike global offense,
    Counter Strike Global Offense,
    csgo,
    CSGO,
    C.S.G.O.,
    Escape from tarkov,
    Tarkov,
    tarkov,
    Fifa,
    gaming,
    Gaming,
    games,
    Games,
    Gaming community,
    Gaming Community,
    gaming community,
    WWII,
    WWII game,
    WWII games,
    world war 2 game,
    world war 2 games,
    Discord community,
    Discord Community,
    discord community,
    discord server,
    First person shooter,
    FPS,
    tactical shooter,
    steam,
    Germans,
    Russians,
    Americans,
    friends,
    ">
    <link rel="icon" href="./img/favicon.ico" type="image/jpg">
    <title>1st Airborne: Hell let Loose clan</title>
    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"
        defer></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Anton font -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/main.js" defer></script>
</head>

<body>
    <?php
        include_once("./templates/header.php");
    ?>
    <div class="container-fluid background home-page">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-1">Welcome To The 1st Airborne</h1>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="container-fluid spacer-page">
    </div>
    <div class="container-fluid background about-page" id="about-page">
        <div class="row position-relative">
            <div class="col-md-12 sub-title-about position-absolute top-0 start-50 translate-middle">
                <h2 class="display-4 ">About Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 about-us-content small-container">
                <span class="title">
                    <h3> What do we offer?</h3>
                </span>
                <span class="wdwo">
                    <ul>
                        <li>We are now participating in SLB (squad line battles). For Hell let Loose.</li>
                        <li>We are hosting our own server for Hell let Loose. ([1stA] 1st Airborne - come fight with
                            us [EU/ENG] - dsc.gg/1sta)</li>
                        <li>In the future we want to participate in league matches.</li>
                    </ul>
                </span>
            </div>
            <div class="col-md-4 about-us-content">
                <span class="title">
                    <h3> Who are we?</h3>
                </span>
                <span class="waw">
                    We are the [1stA]1st Airborne clan, we are a friendly community where everybody is welcome. We were
                    founded by a small group of friends that originated from the game Hell Let Loose. The 1stA clan is
                    an inclusive gaming community, our top priority is having fun and we treat each other with respect.
                    We strive to become a bigger clan in the future. We are recruiting. The 1stA clan is always looking
                    for new fun people to join our community of players (for competition or for fun).
                </span>
            </div>
            <div class="col-md-4 about-us-content small-container">
                <span class="title">
                    <h3> What games do we play?</h3>
                </span>
                <span class="wgdwp">
                    <ul id="space-games">
                        <li class="lines">Hell Let Loose (main game)</li>
                        <li class="lines">Squad</li>
                        <li class="lines">C.S.G.O.</li>
                        <li class="lines">Valorant</li>
                        <li class="lines">Fifa</li>
                    </ul>
                </span>
            </div>
        </div>
    </div>
    <div class="container-fluid spacer-page">
    </div>
    <div class="container-fluid background clip-page">
        <div class="row">
            <div class="col-md-12 sub-title-about">
                <h2 class="display-4 ">Clips</h2>
            </div>
        </div>
        <div class="row">

            <div class="clips-container hide-clips row">
                <?php
                    $clips = $db->prepare("SELECT * FROM clips");
                    $clips->execute();
                    $result = $clips->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $data) {
                        echo "
                        <div class='col-sm-6 col-md-4'>
                            <video src='./media/".$data["clip"]."' loop class='clips'></video>
                        </div>
                        
                        ";
                    }
                
                ?>
                

            </div>
            <div class="col-md-12 clips-container show-gifs">
                <?php
                    $clips = $db->prepare("SELECT * FROM clips");
                    $clips->execute();
                    $result = $clips->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $data) {
                        echo "
                        <div class='col-sm-6'>
                        <img class='clips' src='./img/gifs/".$data["gif"]."' alt='1sta 1st-airborne'>
                        </div>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>

    <?php 
        include_once("./templates/footer.php");
    ?>
   
</body>

</html>