<?php
require_once ("Hero.php");
class Warrior extends Hero
{
    private string $w_name;
    private int $w_strength;
    private int $strenght;
    private int $w_health;

    private array $weapon = [
        ["w_name"=>"Sword","w_strength"=> 10,"w_health"=> 100],
        ["w_name"=>"Katana","w_strength"=> 8, "w_health"=> 80],
        ["w_name"=>"Sabre","w_strength"=> 15, "w_health"=> 75]
    ];

    public function __construct(string $name, int $health, int $strenght)
    {
        parent::__construct($name, $health);
        $random = rand(0,2);
        $this->strenght = $strenght;
        $this->w_name = $this->weapon[$random]["w_name"];
        $this->w_strength = $this->weapon[$random]["w_strength"];
        $this->w_health = $this->weapon[$random]["w_health"];

    }
    public function attack():int{
        if ($this->attackMiss()){
            $this->showMiss();
            return 0;
        }
        echo $this->warCry() . "<br>";
        return $this->getDamage();
    }
    public function display()
    {
        return parent::display() ." Strength: ". $this->strenght . " Weapon: " . $this->w_name
            . " Weapon strength: " .$this->w_strength . " Weapon health: " .$this->w_health;
    }

    public function warCry():string
    {
       return parent::warCry(). ' with ' . $this->w_name . " his damage is: " . $this->w_strength;
    }

    public function canAttack():bool{
        return parent::canAttack() && $this->w_health >= $this->w_strength;
    }
    public function getDamage():int
    {
        $this->w_health -= round($this->strenght* 0.025);
        return $this->w_strength;
    }
    public function showMiss(){
        echo " =====Miss===== " . " from " . parent::displayName() . "<br>";
    }

}