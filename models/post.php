<?php
/**
 * Created by PhpStorm.
 * User: Mustafa
 * Date: 8/26/2019
 * Time: 3:34 PM
 */

class post
{
    private $conn;
    private $table ='posts';

    // table attributes
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //get all posts
    public function read(){
        //create query

        $query='SELECT c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
            from '.$this->table.' p 
            LEFT JOIN
            categories c ON p.category_id = c.id
            ORDER BY p.created_at DESC
        ';

        /*$query='select * from categories';*/

        //prepare
        $stmt=$this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    // get single product
    public function single_post(){
        //create query

        $query='SELECT c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
            from '.$this->table.' p 
            LEFT JOIN
            categories c ON p.category_id = c.id
            Where p.id = :id
            ';

        /*$query='select * from categories';*/

        //prepare
        $stmt=$this->conn->prepare($query);

        /*$stmt->bindParam();*/

        $stmt->execute(array(":id" => $this->id));


        return $stmt;
    }

    //create post
    public function create(){
        $query = "insert INTO ".$this->table." SET
        title = :title,
        body  = :body,
        author = :author,
        category_id = :category_id
        ";

        $stmt =$this->conn->prepare($query);
        $stmt->execute(array(
            ":title"         => htmlspecialchars(strip_tags($this->title)),
            ":body"          => $this->body,
            ":author"        => $this->author,
            ":category_id"   => $this->category_id
        ));

        if($stmt) return true;
        else $stmt->error;
    }

    //create post
    public function update(){
        $query = "UPDATE ".$this->table." SET
        title = :title,
        body  = :body,
        author = :author,
        category_id = :category_id
        ";

        $stmt =$this->conn->prepare($query);
        $stmt->execute(array(
            ":title"         => htmlspecialchars(strip_tags($this->title)),
            ":body"          => $this->body,
            ":author"        => $this->author,
            ":category_id"   => $this->category_id
        ));

        if($stmt) return true;
        else $stmt->error;
    }
}