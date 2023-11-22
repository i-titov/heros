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
        while ($this->hero->canAttack() && $this->opponent->canAttack()):
            $this->opponent->setDamage($this->hero->attack());
            $this->hero->setDamage($this->opponent->attack());
        endwhile;
    }

}