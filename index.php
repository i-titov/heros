<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require_once ('roles/Warrior.php');
require_once ('roles/Mage.php');
require_once ('roles/Fight.php');
ini_set('max_execution_time', '300');
$warrior = new Warrior('War',100,100);

$mage = new Mage('Mage',100,1000);

$fight = new Fight($warrior,$mage);
$fight->fight();
?>
</body>
</html>