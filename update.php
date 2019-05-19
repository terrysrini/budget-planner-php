<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once('database.php');
include_once('updatebudget.php');
$create=new UpdateBudget($db->getConnection());
$data = json_decode(file_get_contents("php://input"));
if( isset($data->budget) && $data->budget == "updatebudget"){
    $from=$data->date;
    $eduid=$data -> eduid;
    $housid=$data -> housid;
    $persid=$data -> persid;
    $savid=$data -> savid;
    $idss=$data -> id;
    $transid=$data -> transid;
    echo $eduid."=>".$housid."=>".$persid."=>".$savid."=>".$transid;
    $monthinc = $data -> monthincctrl;
    $otherinc = $data -> otherincctrl;
    $carpayment = $data -> carctrl;
    $carinsur = $data -> carinsctrl;
    $gasfuel = $data -> gasctrl;
    $repairs = $data -> carrepctrl;
    $transportid = $create -> updateTransport($carpayment,$carinsur,$gasfuel,$repairs,$transid);
    $emergency = $data -> emergctrl;
    $investment = $data -> investctrl;
    $retirement = $data -> retirectrl;
    $savingsid=$create -> updateSavings($emergency,$investment,$retirement,$savid);
    $groceries = $data -> groceriesctrl;
    $clothing = $data -> clothingctrl;
    $entertain = $data -> entertainctrl;
    $medicals = $data -> medicalctrl;
    $pet = $data -> petctrl;
    $other = $data -> otherctrl;
    $personalsid=$create -> updatePersonal($groceries,$clothing,$entertain,$medicals,$pet,$other,$persid);
    $schoosupp = $data -> schoolctrl;
    $studloan = $data -> loansctrl;
    $colltuition = $data -> tuitionctrl;
    $edusid=$create -> updateEducation($schoosupp,$studloan,$colltuition,$eduid);
    $mortgage=$data -> mortctrl;
    $hoafees=$data -> hoafeesctrl;
    $rent=$data -> rentctrl;
    $homeins=$data -> homectrl;
    $repair=$data -> repairctrl;
    $watergas=$data -> waterctrl;
    $cabletv=$data -> cablectrl;
    $phonecall=$data -> phonectrl;
    $housesid=$create -> updateHousing($mortgage,$hoafees,$rent,$homeins,$repair,$watergas,$cabletv,$phonecall,$housid);
    $lastid=$create->updateBudget($from,$monthinc,$otherinc,$idss);
    echo json_encode(array("data" => $lastid,"error"=>''));
}

?>