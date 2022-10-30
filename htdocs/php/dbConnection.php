<?php
    try{
        $db = new PDO("mysql:https://mysql.transip.nl/db_structure.php?server=1&db=1sta_clan_com_1sta;dbname=1sta_clan_com_1sta", "1sta_clan_com_1sta", "db_1stAir");
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
?>