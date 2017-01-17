<?php
$titre=$_POST['Titre'];
$annee=$_POST['Annee'];
$genreId=$_POST['Genre'];
$paysId=$_POST['Pays'];


    $pdo = new PDO("mysql:host=localhost;dbname=streaming;charset=UTF8", "root", "");
    $films = $pdo->query("INSERT INTO film (titre, annee, genre_id, pays_id) VALUES ('$titre', $annee, $genreId, $paysId);");
echo "Informations du film ajouté"."<br>";
echo "Titre ".$titre." Genre ".$genreId." Année ".$annee." Pays ".$paysId."<br>";
?>
<a href="Ajax/listeFilmphp.php"><input type="button" value = "Liste des films"></a>