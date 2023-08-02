<?php
class Database{
    public $connection;
    public  function  __construct($config,$username='root',$password='')
    {

       $dsn='mysql:'.http_build_query($config,'',';');

//        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset=utf8mb4";

        $this->connection = new PDO($dsn,$username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);
    }

    public  function  query($query,$params=[]){
        $statement=$this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
}
