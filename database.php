<?php
require_once('../../config.php');

class DatabaseTranscations {
    
    private $connection;
    
    public function __construct()
    {
            
    }

    private function connection() {
        $connection = new PDOConfig();
        if($connection === false){
            echo "ERROR: Could not connect. " . mysqli_connect_error();
        }
        return $connection;
    }

    public function insert($username, $password) {
        $sql = "INSERT INTO users(username, password) VALUES (?, ?)";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);

            $statement->bindParam(1, strtolower($username), PDO::PARAM_STR);
            $statement->bindParam(2, $password, PDO::PARAM_STR);

            $statement->execute();
            $connection = null;
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function select($id = null) {
        if (isset($id)) {
            $sql = "SELECT * FROM users WHERE id = :id";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $connection = null;
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        } else {
            $sql =  "SELECT * FROM users";
            try {
                $connection = $this->connection();
                $statement = $connection->query($sql);
                $result = $statement->fetchAll();
                $connection = null;
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
        
    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);
            $statement->bindValue(':username', $username);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $connection = null;
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($username, $password, $id) {
        $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);
            $statement->bindParam(1, $username, PDO::PARAM_STR);
            $statement->bindParam(2, $password, PDO::PARAM_STR);
            $statement->bindParam(3, $id, PDO::PARAM_INT);
            $statement->execute();
            $connection = null;
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
    }
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();
            $connection = null;
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
