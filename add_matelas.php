<?php
session_start();

if (!empty($_POST)) {
    $nom_matelas = trim(strip_tags($_POST["nom_matelas"]));
    $dimentions = trim(strip_tags($_POST["dimentions"]));
    $prix = trim(strip_tags($_POST["prix"]));
    $prixb = trim(strip_tags($_POST["prixb"]));
    $img = trim(strip_tags($_POST["img"]));
    $marque = trim(strip_tags($_POST["marque"]));

    $errors = [];
    if (empty($errors)) {
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, 'root', '');

        $query = $db->prepare("INSERT INTO matelas (nom_matelas, dimenstions, prix, prixb, img, marque) VALUES (:nom_matelas, :dimenstions, :prix, :prixb, :img, :marque)");
        $query->bindParam(":nom_matelas", $nom_matelas);
        $query->bindParam(":dimenstions", $dimentions);
        $query->bindParam(":prix", $prix);
        $query->bindParam(":prixb", $prixb);
        $query->bindParam(":img", $img);
        $query->bindParam(":marque", $marque);
        if ($query->execute()) {
            // La requête c'est bien déroulée donc on redirige l'utilisateur vers la page d'accueil
            header("Location: index.php");
        }
    }
}

require_once("tpl/header.php");
?>

<div class="cont_ad">
    <h1>Ajouter un matelas</h1>
    <form method="post">
        <div class="champ">
            <label for="matelas">Entrez le nom du matelas : </label>
            <input type="text" id="matelas" name="nom_matelas">
        </div>
        <div class="champ">
            <label for="dimension">Entrez la dimension du matelas : </label>
            <input type="text" id="dimension" name="dimenstions">
        </div>
        <div class="champ">
            <label for="prixx">Entrez le prix d'origine du matelas : </label>
            <input type="text" id="prix" name="prix">
        </div>
        <div class="champ">
            <label for="prixba">Entrez le prix promo du matelas : </label>
            <input type="text" id="prixba" name="prixb">
        </div>
        <div class="champ">
            <label for="image">Entrez l'url de l'image du matelas : </label>
            <input type="text" id="image" name="img">
        </div>
        <div class="champ">
            <label for="marquee">Entrez la marque du matelas : </label>
            <input type="text" id="marquee" name="marque">
        </div>
        <div>
            <input type="submit" value="Enregistrer">
        </div>
    </form>
</div>

<?php
require_once('tpl/footer.php');
?>