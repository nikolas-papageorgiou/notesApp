<?php


class Database{
    private $connection;
    public function __construct($dbconfig)
    {
        $dsn = "mysql:host={$dbconfig['host']};
        port={$dbconfig['port']};
        dbname={$dbconfig['dbname']};
        charset={$dbconfig['charset']}";
       $this->connection = new PDO($dsn,$dbconfig['user'],$dbconfig['pass'],[
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
       ]);
    }
    public function query($query,$params=[]){
        /*The query must be dynamical so as to change to suite out needs
        *The prepare and execute methods are used to check for SQL Injection
        */
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

}


