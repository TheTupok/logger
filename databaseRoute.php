<?php

namespace Logger\Routes;

use mysqli;
use Logger\Route;

class DatabaseRoute extends Route
{
    private $host;

    private $username;

    private $password;
    private $databaseName;

    private $table;

    private mysqli $connection;

    public function __construct(string $host, string $username, string $password, string $databaseName ,string $tableName)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->databaseName = $databaseName;
        $this->table = $tableName;

        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->databaseName);

        if ($this->connection->connect_error) {
            throw new \Exception("Error connection MySQL: " . $this->connection->connect_error);
        }
    }

    public function log($level, $message, array $context = [])
    {
        $statement = $this->connection->prepare(
            'INSERT INTO ' . $this->table . ' (date, level, message, context) ' .
            'VALUES (?, ?, ?, ?)'
        );

        $statement->bind_param('ssss', $this->getDate(), $level, $message, $this->contextToJson($context));
        $statement->execute();
    }
}