<?php

interface HelpInterface {

    public function getHelp($level);

}

class FrontEnd implements HelpInterface {

    private $nivel = 1;
    private $susesor;

    function __construct(HelpInterface $s) { 

        $this->susesor = $s;
    }

    public function getHelp($nivel) {

        if( $nivel == $this->nivel ){
            echo 'Ayuda del front-end';
        }
        else {
            $this->susesor->getHelp($nivel);
        }
    }

}

class MiddleWare implements HelpInterface {

    private $nivel = 2;
    private $susesor;

    function __construct(HelpInterface $s) { 

        $this->susesor = $s;
    }

    public function getHelp($nivel) {

        if( $nivel == $this->nivel ){
            echo 'Ayuda del middleware';
        }
        else {
            $this->susesor->getHelp($nivel);
        }
    }

}

class BackEnd implements HelpInterface {

    private $nivel = 3;
    private $susesor;

    function __construct(HelpInterface $s) { 

        $this->susesor = $s;
    }

    public function getHelp($nivel) {

        if( $nivel == $this->nivel ){
            echo 'Ayuda del back-end';
        }
        else {
            $this->susesor->getHelp($nivel);
        }
    }

}

class Application implements HelpInterface {

    public function getHelp($nivel) {
        echo 'Ayuda a nivel aplicacion';
    }
}

$app = new Application();
$backend = new BackEnd($app);
$middleware = new Middleware($backend);
$frontend = new FrontEnd($middleware);

$frontend->getHelp(4);
$frontend->getHelp(2);