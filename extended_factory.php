<?php

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

//Este metodo parte de una clase abstracta para la fabrica

abstract class ConnectionFactory {
    
    protected abstract function createConnection();

}


class SecureConnectionFactory extends ConnectionFactory {

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


$factory = new SecureConnectionFactory('mysql');
$con1 = $factory->createConnection();

echo $con1->description();

