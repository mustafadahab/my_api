<?php




class read{

    private $connection;
    public function  __construct($connection)
    {
        $this->connection =$connection;

    }

    public function read_all(){
        $query='select * from oauth_clients';
        //prepare
        $stmt=$this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }
   /* public function read_all(){
        $query='select * from oauth_clients';
        //prepare
        $stmt=$this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }*/
}