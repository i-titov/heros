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
    var_dump($this->opponent->attack());

    }

}