<?php
/**
 * Created by PhpStorm.
 * User: Mustafa
 * Date: 8/26/2019
 * Time: 3:24 PM
 */

class DB
{
    private $host="localhost";
    private $db_name="micro_website";
    private $user_name="root";
    private $password="";
    private $conn;

    public function connect(){
        $this->conn=null;
         try{
             $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->user_name,$this->password);
             $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         }
         catch (PDOException $exception){
             echo "Connection Error:".$exception->getMessage();
         }

         return $this->conn;
    }

}