<?php

class Post
{
    
    private $conn;
    private $table = 'posts';

    public $id;
    public $title;
    public $body;
    public $author;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function read()
    {
        $query = "SELECT id, title, body, author 
                  FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Get single Post

    public function single_post()
    {
        $query = "SELECT id, title, body, author 
                  FROM $this->table WHERE id=:id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
    }

    public function create()
    {

        $query = "INSERT INTO $this->table SET title=:title, body=:body, author=:author";


        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':body',$this->body);
        $stmt->bindParam(':author',$this->author);

        $stmt->execute();
        return $stmt;
    }

    public function update()
    {

        $query = "UPDATE $this->table SET title=:title, body=:body, author=:author WHERE id=:id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':body',$this->body);
        $stmt->bindParam(':author',$this->author);

        $stmt->execute();
        return $stmt;
    }

    public function delete()
    {

        $query = "DELETE FROM $this->table WHERE id=:id";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        return $stmt;
    }




}
