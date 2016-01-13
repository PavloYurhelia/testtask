<?php

namespace PY\Core\Models\Drivers;

use PDO;

class MysqlDriver implements ModelDriverInterface
{
    protected $host;
    protected $DBName;
    protected $userName;
    protected $password;
    protected $connection;

    public function __construct(string $host, string $DBName, string $userName, string $password)
    {
        $this->driver = 'mysql';
        $this->host = $host;
        $this->DBName = $DBName;
        $this->userName = $userName;
        $this->password = $password;

        $dns = $this->driver . ':host=' . $this->host . ';dbname=' . $this->DBName;

        $this->connection = new PDO($dns, $this->userName, $this->password);
    }

    public function execute(string $query, array $params)
    {
        $statement = $this->connection->prepare($query);

        foreach ($params as $field => $value) {
            $statement->bindParam($field, $value);
        }

        $statement->execute();

        return $statement->fetchAll();
    }
}