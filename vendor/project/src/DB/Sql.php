<?php

namespace Project\DB;

class Sql {

    public $conn;

    public function __construct()
    {

        $this->conn = new \PDO("mysql:host=localhost;dbname=crud_php","root","");

    }

    public function select($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        foreach($params as $key => $value) {

            $stmt->bindValue($key, $value);

        }

        $stmt->execute();

        return $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    }

    public function query($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        foreach($params as $key => $value) {

            $stmt->bindValue($key, $value);

        }

        if ($stmt->execute()) {
            return true;
        }
               
    }


}


?>