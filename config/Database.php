<?php 


class Database
{
    // DB Params
    private $host = 'mysql';
    private $db_name = 'myblog';
    private $username = 'root';
    private $password = 'root';
    private $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
            echo 'radi';
        } catch (PDOException $e) {
            echo 'Problem'.$e->getMessage();
        }
        return $this->conn;
    }
}