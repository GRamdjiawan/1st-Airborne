<?php
    try{
        $db = new PDO("mysql:https://mysql.transip.nl/;dbname=1sta_clan_com_1sta", "1sta_clan_com_1sta", "1stAirborne");
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
?>