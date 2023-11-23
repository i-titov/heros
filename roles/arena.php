<?php
require_once ('Warrior.php');
require_once ('Mage.php');
require_once ('Fight.php');

function createdHero($type){
    return match ($type){
        'mage'=> new Mage('Mage',100,1000),
        'warrior'=> new Warrior('War',100,100),
        default=>null
    };
}
$hero = createdHero($_POST["hero"]);
$opponent = createdHero($_POST["opponent"]);
$fight = new Fight($hero,$opponent);
$fight->fight();