<?php

class Database{

    //define private properties for database connection parameters. Values are taken form the config file
    private $host =  DB_HOST;
    private $user =  DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;
    private $dbport = DB_PORT;

    private $dbh; //database handler
    private $stmt; //SQL statement
    private $error; //error message

    //constructor method to initialize the databse connection
    public function __construct(){
                
        //data Source Name (DSN) for the PDO connection
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';port=' . $this->dbport;
    
        //options for the PDO connection
        $option = [
            //Use persistent connection 
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Throw exceptions on errors
        ];

        //try to connect to the database by creation a new PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->password, $option);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //method to prepare an SQL query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //method to execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    //method to fetch all results as an associative array
    public function results(){
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //method to fetch a single result to an associative array
    public function result(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //method to bind a value to a parameter in the SQL statement
    public function bind($param, $value){
        $this->stmt->bindValue($param, $value);
    }
}