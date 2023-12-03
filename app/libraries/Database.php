<?php

/*
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbHandle;
    private $stmt;
    private $error;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options (PDO)
        $options = array(
            PDO::ATTR_PERSISTENT => true, // Persistent connection
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Throw exceptions
        );
        // Create PDO instance
        try {
            $this->dbHandle = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare statement with query
    public function query($sql)
    {
        $this->stmt = $this->dbHandle->prepare($sql);
    }

    // Type determination function
    private function determineType($value)
    {
        if (is_int($value)) {
            return PDO::PARAM_INT;
        }
        if (is_bool($value)) {
            return PDO::PARAM_BOOL;
        }
        if (is_null($value)) {
            return PDO::PARAM_NULL;
        }
        return PDO::PARAM_STR;
    }

    // Bind values
    public function bind($param, $value)
    {
        if (is_array($value)) {
            foreach ($value as $key => $v) {
                $type = $this->determineType($v);
                // Bind value
                $this->stmt->bindValue(":{$param}[{$key}]", $v, $type);
            }
        } else {
            $type = $this->determineType($value);
            // Bind value
            $this->stmt->bindValue($param, $value, $type);
        }
    }

    // Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbHandle->lastInsertId();
    }
}