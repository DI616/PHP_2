<?php
class Product
{
    public $id;
    public $title;
    public $desc;
    public $image;
    public $price;
    public $discount
    public function sale {
        $this->discount ? $this->price = $this->price * ((100 - $this->discount)/100);
    }
}

class ActionProduct extends Product {
    public $action;
    public $id_action;
    public function sale {
        $this->discount ? $this->price = $this->price * ((100 - ($this->discount + 15))/100);
    }
}

//---------------------------------------------------------------------------------------------------------

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1, свойство статично, несмотря на то, что вызывается из не статического метода, изменения внутри класса наследуются всеми дочерними объектами
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2
// Два объекта созданы из разных классов, поэтому обращение к статическому свойству из одного объекта никак не влияет на свойство другого, в остальном все как в предыдущем примере


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 
// Все как в предыдущем примере, за исключением синтаксиса создания объектов, но, так как в классе не предусмотрен конструктор, скобки после объявления класса не обязятельны
?>