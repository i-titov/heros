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

        echo "~~~~~~~~~~Fight has started~~~~~~~~~~ <br> ";
        echo "~~~~~~~~~~ ".$firstPlayer->displayName() . " VS " . $secondPlayer->displayName()."~~~~~~~~~~ ". "<br>". "<br>";


        while ($firstPlayer->canAttack() && $secondPlayer->canAttack()):
            //Start Round
            $this->showRound($round);

            // First player attacks
            $secondPlayer->setDamage($firstPlayer->attack());

            // Change players
            $temp = $firstPlayer;
            $firstPlayer = $secondPlayer;
            $secondPlayer = $temp;

            // Second player attacks
            $secondPlayer->setDamage($firstPlayer->attack());

            //Display results of round
            echo $firstPlayer->displayName() . " has " . $firstPlayer->getHealth() . " hp ". " and "
                . $secondPlayer->displayName() . " has " . $secondPlayer->getHealth() . " hp ". "<br>";

            $round++;
        endwhile;

        $winner = $firstPlayer->getHealth() > 0 ? $firstPlayer :  $secondPlayer;

        //set levels for winner
        $winner->levelUp();
        $this->saveResult($winner->displayName(), $winner->getLevel());

        echo $winner->displayName() . " is WINNER " . "<br>";
    }
    public function saveResult(string $winner,$level){
        return setcookie($winner, $level, time() + (86400 * 30), "/");
    }
    public function showRound(int $round):void{
        echo "::::::::::::::::::::::: Round: $round ::::::::::::::::::::: <br>";
    }
}