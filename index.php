<?php
session_start();

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, 'root', '');
$query = $db->query('SELECT * FROM matelas');
$matelas = $query->fetchAll();
// var_dump($results);
require_once("tpl/header.php");
?>

<h1>Catalogue</h1>
<div>
    <?php
    foreach ($matelas as $matela) {
    ?>

        <div>
            <h2><?= $matela["nom"] ?></h2>
            <img src="<?=$matela["img"]  ?>" alt="">
            <p>Dimension: <?=$matela["dimenstions"]  ?></p>
            <p>Prix d 'origine : <?=$matela["prixb"]  ?></p>
            <p> Prix promo : <?=$matela["prix"]  ?> </p>
        </div>
    <?php
    }
    ?>
</div>


<?php
require_once('tpl/footer.php');
?>