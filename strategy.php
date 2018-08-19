<?php

interface GoAlgorithm {

    public function go();
}

class GoByDriving implements GoAlgorithm {

    public function go() {
        echo ' Vamos manejando | ';
    }
}

class GoByFlying implements GoAlgorithm {

    public function go() {
        echo ' Vamos volando | ';
    }
}

class GoByFlyingFast implements GoAlgorithm {

    public function go() {
        echo ' Vamos volando bien rapido | ';
    }
}

abstract class Vehicle {
    
    private $goAlgorithm;

    public function setGoAlgoritm( GoAlgorithm $algorithm ){
        $this->goAlgorithm = $algorithm;
    }

    public function go() {
        $this->goAlgorithm->go();
    }
}

class Auto extends Vehicle {

    function __construct() {
        $this->setGoAlgoritm( new GoByDriving() );
    }
}

class Jet extends Vehicle {

    function __construct() {
        $this->setGoAlgoritm( new GoByDriving() );
    }
}

$myAuto = new Auto();
$myAuto->go();

$myJet = new Jet();
$myJet->go();

$myJet->setGoAlgoritm( new GoByFlying() );
$myJet->go();

$myJet->setGoAlgoritm( new GoByFlyingFast() );
$myJet->go();

