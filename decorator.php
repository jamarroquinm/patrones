<?php

class Computer{

    public function description() {
        return 'Computadora';
    }
}

abstract class ComputerDecorator extends Computer {

    //abstract public function description();
    // en php esto no es necesario usar esta clase abstracta
    // el programa funciona bien sin esto
    // solo se usa para manener los tipos
    // podría ser una interfaz ... puede una interfaz ezxtender una clase?   NO! lo probe
}

// interface Decorator extends Computer {
//     public function description();
// }

class Disk extends ComputerDecorator {

    private $computer;

    function __construct(Computer $computer) { 

        $this->computer = $computer;
    }

    public function description() {
        return $this->computer->description() . ' and a disk';
    }

}

class Monitor extends ComputerDecorator {

    private $computer;
    

    function __construct(Computer $computer) { 

        $this->computer = $computer;
    }

    public function description() {
        return $this->computer->description() . ' and a monitor';
    }

}


class CD extends ComputerDecorator {

    private $computer;

    function __construct(Computer $computer) { 

        $this->computer = $computer;
    }

    public function description() {
        return $this->computer->description() . ' and a CD';
    }

}

$myPc = new Computer();

$myPc = new Disk($myPc);
$myPc = new Monitor($myPc);
$myPc = new CD($myPc);

echo $myPc->description();