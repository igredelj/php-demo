<?php

namespace Core;

use PDO;

class Database {

    public $connection;

    public $statement;

    public function __construct($config, $userName = 'root', $password = 'root')
    {
        $dsn = 'mysql:'.http_build_query($config, '', ';');
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->connection = new PDO($dsn, $userName, $password, $options);
    }

    public function query($query, $params)
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;

    }


    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}
