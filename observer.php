<?php

interface Subject {

    public function registerObserver(Observer $o);
    public function removeObserver( Observer $o);
    public function notifyObservers();

}

interface Observer {

    public function update($operation, $record);

}

class Database implements Subject {
    
    private $observers;
    private $operation;
    private $record;

    function __construct() { 

        $this->observers = array();

    }

    public function registerObserver( Observer $o ) {

        array_push( $this->observers, $o );

    }

    public function removeObserver( Observer $o ) {
        array_pop( $this->observers );
    }

    public function notifyObservers() {

        foreach ($this->observers as $observer) {
            $observer->update($this->operation, $this->record);
        }

    }


    public function editRecord($operation, $record){

        $this->operation = $operation;
        $this->record = $record;
        $this->notifyObservers();
    }

}


class Archiver implements Observer {

    public function update( $operation, $record ) {
        echo ' <Archiver : ' . $operation . ' | recoord: ' .  $record . '> ';
    }
}


class Client implements Observer {

    public function update( $operation, $record ) {
        echo ' <Client : ' . $operation . ' | recoord: ' .  $record . '> ';
    }
}

$database = new Database();
$archiver = new Archiver();
$client = new Client();

$database->registerObserver($archiver);
$database->registerObserver($client);

$database->editRecord('edit', 2);
$database->editRecord('delete', 3);
