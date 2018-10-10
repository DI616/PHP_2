<?php
trait Singleton {
    protected static $instance;
    protected function __construct()
    {
        static::setInstance($this);
    }
    final public static function setInstance($instance)
    {
        static::$instance = $instance;
        return static::$instance;
    }
    final public static function getInstance()
    {
        return isset(static::$instance) ? static::$instance : static::$instance = new static;
    }
}

abstract class Goods {
    public $name;
    public $price;
    public $type;
    
    abstract public function GetPrice();
    public function __construct($name, $price){
        $this->name = $name;
        $this->price = $price;
    }
}

class PieceGoods extends Goods {
    public $type = 1;
    public function GetPrice(){
        $profit = $this->price;
        return $profit;
    }
}

class DigitalGoods extends Goods {
    public $type = 2;
    public function GetPrice(){
        $profit = $this->price * 0.5;
        return $profit;
    }
}

class WeightGoods extends Goods {
    use Singleton;
    public $type = 3;
    public $weight; 
    public function GetPrice(){
        $profit = $this->price * $this->weight;
        return $profit;
    }
}

?>