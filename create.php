<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once('database.php');
include_once('createbudget.php');
$create=new CreateBudget($db->getConnection());
$data = json_decode(file_get_contents("php://input"));
if( isset($data->budget) && $data->budget == "budget"){
    $from=$data->date;
    $monthinc = $data -> monthincctrl;
    $otherinc = $data -> otherincctrl;
    $carpayment = $data -> carctrl;
    $carinsur = $data -> carinsctrl;
    $gasfuel = $data -> gasctrl;
    $repairs = $data -> carrepctrl;
    $transportid = $create -> insertTransport($carpayment,$carinsur,$gasfuel,$repairs);
    $emergency = $data -> emergctrl;
    $investment = $data -> investctrl;
    $retirement = $data -> retirectrl;
    $savingsid=$create -> insertSavings($emergency,$investment,$retirement);
    $groceries = $data -> groceriesctrl;
    $clothing = $data -> clothingctrl;
    $entertain = $data -> entertainctrl;
    $medicals = $data -> medicalctrl;
    $pet = $data -> petctrl;
    $other = $data -> otherctrl;
    $personalid=$create -> insertPersonal($groceries,$clothing,$entertain,$medicals,$pet,$other);
    $schoosupp = $data -> schoolctrl;
    $studloan = $data -> loansctrl;
    $colltuition = $data -> tuitionctrl;
    $eduid=$create -> insertEducation($schoosupp,$studloan,$colltuition);
    $mortgage=$data -> mortctrl;
    $hoafees=$data -> hoafeesctrl;
    $rent=$data -> rentctrl;
    $homeins=$data -> homectrl;
    $repair=$data -> repairctrl;
    $watergas=$data -> waterctrl;
    $cabletv=$data -> cablectrl;
    $phonecall=$data -> phonectrl;
    $houseid=$create -> insertHousing($mortgage,$hoafees,$rent,$homeins,$repair,$watergas,$cabletv,$phonecall);
    $lastid=$create->insertBudget($from,$monthinc,$otherinc,$eduid,$houseid,$personalid,$savingsid,$transportid);
    echo json_encode(array("data" => $lastid,"error"=>''));
}
else{
    die("403 Forbidden");
}

?>