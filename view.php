<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once('database.php');
include_once('createbudget.php');
$create=new CreateBudget($db->getConnection());
if(isset($_GET["delete"]) && !empty($_GET["delete"]) && $_GET["delete"]=="budget"){
    $result=$create->deleteBudget($_GET["id"]);
    echo json_encode($result);
}
else if(isset($_GET["date"]) && !empty($_GET["date"])){
    $result=$create->getDateBudget($_GET["date"]);
    echo json_encode($result);
}
else if(isset($_GET["id"]) && !empty($_GET["id"])){
    $result=$create->getOneBudget($_GET["id"]);
    echo json_encode($result);
}
else{
$result=$create->getAllBudget();
echo json_encode($result);
}

?>