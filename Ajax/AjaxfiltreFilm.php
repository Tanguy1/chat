<?php
include_once("../_config.php");

$titre = $_GET['titre'];
$paysId = $_GET['paysId'];
$genreId = $_GET['genreId'];

$requete = "SELECT * "
        ." FROM film"
        ." WHERE pays_id=".$paysId
        ." AND genre_id=".$genreId
        ." AND titre LIKE '%$titre%'";
//echo $requete;
$filtrefilms = $pdo->query($requete)->fetchAll();
echo json_encode($filtrefilms);

?>