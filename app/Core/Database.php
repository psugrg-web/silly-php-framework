<?php

namespace Core;

use PDO;

class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $username = 'u356087_sl_app', $password = 'test')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (\Throwable $th) {
            echo 'Exception: ', $th->getMessage(), "\n";
        }
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
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

    public function get()
    {
        return $this->statement->fetchAll();
    }
}
