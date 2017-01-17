<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once ('../_config.php');
    $pays = $pdo->query("SELECT * FROM pays ORDER BY nom")->fetchAll();
    $genres = $pdo->query("SELECT * FROM genre ORDER BY intitule")->fetchALL();
    
?>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Filtrer Film</title>
        <script src="../JS/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready( function(){
                $('#filtrer').click(function(){
                    $.getJSON('AjaxfiltreFilm.php',
                    $('form').serialize(), callBackFiltrer);
                })
            });
            
            function callBackFiltrer(data){
                for(i=0;i<data.length;i++){
                    $("#resultat").append(data[i].titre+" ");
                    $("#resultat").append(data[i].annee+"<br>");
                    
                }
            };
        </script>
    </head>
    <body>
        <div id="filtre">
            <form>
                Titre: <input name="titre"/>
                <br>
                Pays: <select name="paysId">
<?php
            foreach ($pays as $value) {

?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value ['nom'] ?></option>
<?php
}
?>
            </select>
                <br>
                Genre: <select name="genreId">
<?php
            foreach ($genres as $value) {

?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value ['intitule'] ?></option>
<?php
}
?>
            </select>
                <br>
                <input id="filtrer" type="button" value="Filtrer"/>
            </form>
        </div>
        <div id="resultat"></div>
    </body>
</html>
