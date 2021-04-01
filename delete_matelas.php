<?php
session_start();

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, 'root', '');


$pdoStat = $db-> prepare('DELETE from matelas WHERE id=:num LIMIT 1');
$pdoStat->bindValue(':num',$_GET['Numbmatelas'], PDO::PARAM_INT);
$executeIsOk = $pdoStat->execute();

if($executeIsOk){
    $message = "Le matelas à été supprimé";
}else{
    $message = "Echec de la supperssion du matelas";
}

require_once("tpl/header.php");
?>



<h1>Supperssion</h1>

<p><?=$message  ?></p>

<?php
require_once('tpl/footer.php');
?>