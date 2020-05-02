<?php
/*
*
* PDO Database Class
* Connect to database
* Create prepared statements
* Bind values
* Return rows and results
*/

class Database {
    // Database connection constants
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // Database handler lets you use the same php code for multiple types of databases
    private $dbHandler;
    // $stmt holds prepared sql statement
    private $stmt;
    // $error holds caught PDO Exception
    private $error;

    // Creates database object with our login credentials
    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true, // Persistent connection
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Errors throw exceptions
        );

        // Create PDO instance
        try {
            $this->dbHandler = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }


    // Three Steps to Run SQL Code
    // 1. Make query
    // 2. Bind values
    // 3. Execute statement

    // Prepare statement with query
    public function query($sql) {
        $this->stmt = $this->dbHandler->prepare($sql);
    }


    // Funtion to allow use of bindValue funtion when variable type is not specified
    public function bind($param, $value, $type = null) {
        // If type is not specified, figures out which.
        // This is done as it is required for bindValue() PDO function
        if(is_null($type)) {
            switch(true) {
                case is_int($value): 
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value): 
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value): 
                    $type = PDO::PARAM_NULL;
                    break;
                default: 
                    $type = PDO::PARAM_STR;
            }
        }

        // Binds values to named variables in prepared statement
        $this->stmt->bindValue($param, $value, $type);
    }


    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }


    // Functions to determine what is wanted from the returned query
    // Get result set as array of objects - Multiple Rows
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object - Next Row, or first if only row
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count - Number of Rows
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}