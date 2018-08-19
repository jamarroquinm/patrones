<?php

//Un modelo básico de abrica

abstract class Connection {
    
    public function description() {
        return 'Generico';
    }
}

class OracleConnection extends Connection {

    public function description() {
        return 'Oracle';
    }
}

class MsSqlConnection extends Connection {

    public function description() {
        return 'MS Sql';
    }
}

class MySqlConnection extends Connection {

    public function description() {
        return 'mySql';
    }
}

//Este metodo parte de una clase concreta. La fabrica es una calse
//concreta y crea los objeto a partir del parametro enviado

class ConnectionFactory {

    protected $type;

    function __construct($t) { 

        $this->type = $t;
    }

    public function createConnection() {

        if( $this->type == 'oracle' ) {
            return new OracleConnection();
        }

        if( $this->type == 'mssql' ) {
            return new MsSqlConnection();
        }

        if( $this->type == 'mysql' ) {
            return new MySqlConnection();
        }
    }
}


$factory = new ConnectionFactory('oracle');
$con1 = $factory->createConnection();

echo $con1->description();

