<?php
session_start();

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, 'root', '');
$query = $db->query('SELECT * FROM matelas');
$matelas = $query->fetchAll();

require_once("tpl/header.php");
?>
<div class="container">

<h1>Catalogue</h1>
<div class="body_cat">
    <?php
    foreach ($matelas as $matela) {
    ?>

        <div class="div_cat">
        <img src="<?=$matela["img"]  ?>" alt="">
            <h2><?= $matela["nom_matelas"] ?></h2>
            <p> Marque : <?=$matela["marque"]  ?></p>
            <p>Dimension: <?=$matela["dimenstions"]  ?></p>
            <p class="p_old">Prix d 'origine : <?=$matela["prixb"]  ?></p>
            <p class="p_promo"> Prix promo : <?=$matela["prix"]  ?> </p>
            <a href="delete_matelas.php?Numbmatelas=<?=$matela["id"]?>" class="buttonsuppr">Supprimer</a>
        </div>
    <?php
    }
    ?>
</div>
</div>


<?php
require_once('tpl/footer.php');
?>