<?phpclass Hero{    private string $name;    private int $health;    public function __construct(string $name, int $health)    {        $this->name = $name;        $this->health = $health;    }    public function display()    {        return "Name : " . $this->name . " Health: " . $this->health;    }    public function warCry(){        return $this->name . " attacks ";    }    public function getHealth(): int    {        return $this->health;    }    public function setDamage(int $damage):void    {        $this->health -= $damage;    }    //We are all humans and can we make mistakes    public function attackMiss(){        $random = rand(0,5);        if($random === 5){            return true;        }    }}