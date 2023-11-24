<?php
require_once ('Hero.php');

final class Mage extends Hero
{
    private string $spell_name;
    private int $s_strength;
    private int $mana_cost;
    private int $mana;

    private array $weapon = [
        ["spell_name"=>"Fire Ball","s_strength"=> 15,"mana_cost"=> 100],
        ["spell_name"=>"Frost Ball","s_strength"=> 10, "mana_cost"=> 80],
        ["spell_name"=>"Dark Ball","s_strength"=> 8, "mana_cost"=> 75]
    ];

    public function __construct(string $name,int $level)
    {
        parent::__construct($name,$level);
        $random = rand(0,2);
        $this->mana = 1000;
        $this->spell_name = $this->weapon[$random]["spell_name"];
        $this->s_strength = $this->weapon[$random]["s_strength"];
        $this->mana_cost = $this->weapon[$random]["mana_cost"];

    }
    public function display():string
    {
        return parent::display() . " Mana: " .$this->mana . " Spell: " . $this->spell_name . " Spell strength: " .$this->s_strength
            . " Mana cost: " .$this->mana_cost;
    }
    public function displayName()
    {
        return parent::displayName();
    }

    public function attack():int{
        if ($this->attackMiss()){
            $this->showMiss();
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
        return parent::canAttack() && $this->mana >= $this->mana_cost;
    }

    public function getDamage():int
    {
        $this->mana -= $this->mana_cost;
        return round($this->s_strength + (0.01 * $this->level));
    }
    public function showMiss(){
        echo " ===========Miss=========== " . " from " . parent::displayName() . "<br>";
    }
}