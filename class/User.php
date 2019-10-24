<?php 
class User {

    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    //Fetch All Data in the Database
    public function selectAll() {
       $stmt = $this->pdo->prepare("SELECT * FROM users ORDER BY id DESC");
       $stmt->execute();
       $result = $stmt->fetchAll();
    
        return $result;
    }

    //Check Row Count
    public function checkRowCount($statement) {
        if($statement > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Create or Insert data in the database
    public function createData($name,$username,$password,$email) {    
        $stmt = $this->pdo->prepare("INSERT into users (`name`,`username`,`password`,`email`) 
                VALUES (:name,:username,:password,:email)");
        $stmt->bindParam(":name",$name,PDO::PARAM_STR);
        $stmt->bindParam(":username",$username,PDO::PARAM_STR);
        $stmt->bindParam(":password",$password,PDO::PARAM_STR);
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $result = $stmt->execute();

        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function selectUserByID($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
    
        return $result;
    }

    public function updateData($name,$username,$password,$email,$id) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = :name, username = :username, password = :password, email = :email WHERE id = :id");
        $stmt->bindParam(":name",$name,PDO::PARAM_STR);
        $stmt->bindParam(":username",$username,PDO::PARAM_STR);
        $stmt->bindParam(":password",$password,PDO::PARAM_STR);
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteData($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }
}

?>