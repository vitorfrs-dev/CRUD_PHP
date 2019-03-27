<?php

namespace Project\Model;

use Project\DB\Sql;
use Project\Model;

class User extends Model {

    public static function listAll()
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM clientes");

        return $results;
    }

    //Seleciona um usuario através do id e carrega o objeto User
    public function get($iduser)
    {
        $sql = new Sql();

        $results = $sql->select('SELECT * FROM clientes WHERE iduser = :iduser', [
            ':iduser' => $iduser
        ]);

        $data = $results[0];

        $this->setData($data);
    }

    public function save()
    {

        $sql = new Sql();

        $sql->query('INSERT INTO clientes (name, phone, email, turma, avatar_url) 
        VALUES (:name, :phone, :email, :turma, :avatar_url)', [ 
            ':name'     => $this->getname(),
            ':phone'    => $this->getphone(),
            ':email'    => $this->getemail(),
            ":turma"     => $this->getturma(),
            ':avatar_url' => '/res/01-02/img/user.png'
        ]);

    }

    public function update()
    {

        $sql = new Sql();

        $sql->query('UPDATE clientes SET name = :name, phone = :phone, email = :email, turma = :turma, avatar_url = :avatar_url WHERE iduser = :iduser', [ 
            ':iduser'   => $this->getiduser(),
            ':name'     => $this->getname(),
            ':phone'    => $this->getphone(),
            ':email'    => $this->getemail(),
            ':turma'    => $this->getturma(),
            ':avatar_url' => $this->getavatar_url()
        ]);

    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query('DELETE FROM clientes WHERE iduser = :iduser', [
            ':iduser' => $this->getiduser()
        ]);
    }

    //Realiza uma busca personalizadas
    public static function userSearch($search)
    {

        $sql = new Sql();

        $result = $sql->select('SELECT * FROM clientes WHERE iduser = :id
        OR name LIKE :search
        OR email LIKE :search
        OR turma LIKE :search', [
           ":search" => '%' . $search . '%',
           ":id" => $search
        ]);

        return $result;

    }

    public static function getPagination($page = 1, $itemsPerPage = 10)
    {

        $sql = new Sql();

        $start = ($page - 1) * $itemsPerPage;

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM clientes
        LIMIT $start, $itemsPerPage");
        
        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal; ");

        return [
            'data' => $results, //resultados da pesquisa SQL
            'total' => (int)$resultTotal[0]['nrtotal'], // nº do total geral de registros
            'pages' => ceil($resultTotal[0]['nrtotal'] / $itemsPerPage) // registros/itens por pagina
        ];

    }

    public static function getPaginationSearch($search, $page = 1, $itemsPerPage = 10)
    {

        $sql = new Sql();

        $start = ($page - 1) * $itemsPerPage;

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM clientes WHERE iduser = :id
        OR name LIKE :search
        OR email LIKE :search
        OR turma LIKE :search
        LIMIT $start, $itemsPerPage", [
           ":search" => '%' . $search . '%',
           ":id" => $search
        ]);
        
        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal; ");

        return [
            'data' => $results, //resultados da pesquisa SQL
            'total' => (int)$resultTotal[0]['nrtotal'], // nº do total geral de registros
            'pages' => ceil($resultTotal[0]['nrtotal'] / $itemsPerPage) // registros/itens por pagina
        ];

    }

}


?>