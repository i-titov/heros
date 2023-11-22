<?php

class Mage extends Hero
{
    private string $spell_name;
    private int $s_strength;
    private int $mana_cost;
    private int $mana;

    private array $weapon = [["spell_name"=>"Fire Ball","s_strength"=> 15,"mana_cost"=> 100],
        ["spell_name"=>"Frost Ball","s_strength"=> 10, "mana_cost"=> 80],
        ["spell_name"=>"Dark Ball","s_strength"=> 8, "mana_cost"=> 75]];

    public function __construct(string $name, int $health, int $mana)
    {
        parent::__construct($name, $health);
        $random = rand(0,2);
        $this->mana = $mana;
        $this->spell_name = $this->weapon[$random]["spell_name"];
        $this->s_strength = $this->weapon[$random]["s_strength"];
        $this->mana_cost = $this->weapon[$random]["mana_cost"];

    }
    public function display():string
    {
        return parent::display() . " Mana: " .$this->mana . " Spell: " . $this->spell_name . " Spell strength: " .$this->s_strength
            . " Mana cost: " .$this->mana_cost;
    }

    public function attack():int{
        if ($this->attackMiss()){
            echo " =====Miss===== ";
            return 0;
        }
        echo $this->warCry() . "<br>";
        return $this->getDamage();
    }
    public function warCry():string
    {
        return parent::warCry(). ' with ' . $this->spell_name . " his damage is: " . $this->s_strength;
    }

    public function canAttack():bool{
        return $this->mana >= $this->mana_cost && $this->getHealth() > 1;
    }

    public function getDamage():int
    {
        $this->mana -= $this->mana_cost;
        return $this->s_strength;
    }
}