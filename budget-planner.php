
<?php
header("Content-Type: application/json; charset=UTF-8");
include_once('database.php');
include_once('budget.php');
$budget=new Budget($db->getConnection());
?>