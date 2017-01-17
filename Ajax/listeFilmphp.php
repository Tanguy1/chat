<?php
$pdo = new PDO("mysql:host=localhost;dbname=streaming;charset=UTF8", "root", "");

if (isset($_GET['id'])) {
    $sql = "DELETE FROM film WHERE id=" . $_GET['id'];
    $pdo->query($sql);
}

$requete = "SELECT film.annee, film.titre, film.id, genre.intitule, pays.nom FROM film JOIN genre ON genre.id=film.genre_id 
JOIN pays ON pays.id = film.pays_id
ORDER BY titre";
//echo "req : ".$requete;
$films = $pdo->query($requete)->fetchAll();
?>
<table border = 1px >
    <tr>
        <th>Titre</th>
        <th>Genre</th>
        <th>Année</th>
        <th>Pays</th>
        <th>Action</th>
    </tr>
<?php foreach ($films as $value) {
    ?>
        <tr >
            <td> <?php echo $value['titre'] ?></td>
            <td> <?php echo $value['intitule'] ?></td>
            <td> <?php echo $value['annee'] ?></td>
            <td> <?php echo $value['nom'] ?></td>
            <td> <?php echo " <a href=listeFilmphp.php?id=".$value["id"].">Supprimer</a>";?></td>
        </tr>
    <?php
}
?>
</table>