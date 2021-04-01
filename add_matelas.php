<?php
session_start();

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, 'root', '');

require_once("tpl/header.php");
?>

<div class="container_ad">
    <h1>Ajouter un matelas</h1>
    <Form>

    </Form>
</div>

<?php
require_once('tpl/footer.php');
?>