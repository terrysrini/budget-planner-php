<?php 
class Budget{
    private $connection;
    public function __construct($conn){
    $this->connection=$conn;
    }
    public function readallBudgets(){
        $query = "SELECT";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function readOneBudget(){
        $query = "SELECT";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function updateBudget(){
        $query = "SELECT";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function deleteBudget(){
        $query = "SELECT";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}

?>