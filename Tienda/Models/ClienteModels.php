<?php

require_once './Database.php';

class ClienteModels {
    private $conn;

    public function __construct()
    {
        $database = new Database;
        $this->conn = $database->getConn();
    }

    function all()
    {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$prueba = new ClienteModels();

$a = $prueba->all();

print_r($a);