<?php
    $pdo = new PDO("mysql:host=localhost;dbname=streaming;charset=UTF8", "root", "");
    $genres = $pdo->query("SELECT * FROM genre");
    $paysId = $pdo->query("SELECT * FROM pays");
?>

<html>
    <body>
        <form action="ajouterFilmPOST.php" method="POST">
            <label>Titre</label>
            <input type="text" name="Titre"><br>
            <label>Année</label>
            <input type="text" name="Annee"><br>
            <label>Genre</label>
            <select name="Genre">
                <?php foreach ($genres as $genre) {
                    ?>
                    <option value="<?php echo $genre['id']; ?>"><?php echo $genre['intitule']; ?></option>
                    <?php
                }
                ?>
            </select>
            <br>
            <label>Pays</label>
            <select name="Pays">
                <?php foreach ($paysId as $value) {
                    ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['nom']; ?></option>
                    <?php
                }
                ?>
            </select><br>
            <input type="submit" value="Ajouter">
        </form>
    </body>
</html>
