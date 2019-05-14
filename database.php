<?php 
include('./config.php');
class Database{
    private $host="localhost";
    private $db_name="budget_planner";
    private $username="root";
    private $password="";
    public $conn;
    public function __construct(){
        $this->getConnection();
    }
    public function getConnection(){
    $this->conn=null;
    try{
    $this->conn=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
    $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $this->conn->exec("set names utf8");
    }
    catch(PDOException $exception){
    echo "Connection Error:".$exception->getMessage();
    }
    return $this->conn;
    }
}
$db=new Database();
?>