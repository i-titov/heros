<?php

class Fight
{
    private $hero;
    private $opponent;
    public function __construct($hero, $opponent)
    {
        $this->hero = $hero;
        $this->opponent = $opponent;
    }

    public function fight(){
        $round = 1;
        $firstPlayer = $this->hero;
        $secondPlayer = $this->opponent;
        while ($firstPlayer->canAttack() && $secondPlayer->canAttack()):
            $secondPlayer->setDamage($firstPlayer->attack());

            // Change
            $temp = $firstPlayer;
            $firstPlayer = $secondPlayer;
            $secondPlayer = $temp;

            $secondPlayer->setDamage($firstPlayer->attack());

            echo $firstPlayer->displayName() . " has " . $firstPlayer->getHealth() . " hp ". " and "
                . $secondPlayer->displayName() . " has " . $secondPlayer->getHealth() . " hp ". "<br>";

            echo "::::::::::::::::: Round: $round ::::::::::::::::: <br>";
            $round++;
        endwhile;
        $looser = $firstPlayer->getHealth() <= 0 ? $firstPlayer->displayName() :  $secondPlayer->displayName();
        $winner = $firstPlayer->getHealth() <= 0 ? $firstPlayer->displayName() :  $secondPlayer->displayName();
        echo $looser . " is lost " . "<br>";
    }
    public function saveResult($result){

    }
}