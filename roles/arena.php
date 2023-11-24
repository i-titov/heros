<?php
require_once ('Warrior.php');
require_once ('Mage.php');
require_once ('Fight.php');

function getLevelsFromCookies(string $hero){
    return $_COOKIE[$hero] ?? 0;
}
function createdHero($type){
    return match ($type){
        'mage'=> new Mage('Mage',getLevelsFromCookies('Mage')),
        'warrior'=> new Warrior('War',getLevelsFromCookies('War')),
        default=>null
    };
}
$hero = createdHero($_POST["hero"]);
$opponent = createdHero($_POST["opponent"]);
$fight = new Fight($hero,$opponent);
$fight->fight();