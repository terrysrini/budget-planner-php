<?php 
class UpdateBudget{
    private $connection;
    public function __construct($conn){
    $this->connection=$conn;
    }
    public function updateHousing($mortgage,$hoafees,$rent,$homeins,$repair,$watergas,$cabletv,$phonecall,$houseid){
        echo $mortgage.$hoafees.$rent.$homeins.$repair.$watergas.$cabletv.$phonecall.$houseid;
        $sql ="UPDATE `housing` SET `mortgage`=:mortgage, `hoa` = :hoafees, `rent`=:rent, 
        `homeins`=:homeins, `repair_main`=:repair, `watgasele`=:watgas, `cabtvinternet`=:cabtv, 
        `phonecell`=:phonecel
        where house_id = :houseid";
        $stmt = $this->connection->prepare( $sql );
   
    $pdoexec = $stmt->execute( array( ":mortgage" => $mortgage, ":hoafees" =>$hoafees , ":rent" =>$rent,":homeins" => $homeins, ":repair" =>$repair, 
    ":watgas" =>$watergas, ":cabtv" =>$cabletv, ":phonecel" =>$phonecall, ":houseid" =>$houseid) );
    if( $stmt->rowCount() ){
        return $stmt->rowCount();
    }else{
        return __LINE__;
       }
   
    }
    public function updateEducation($schoosupp,$studloan,$colltuition,$eduid){
        // echo $schoosupp.$studloan.$colltuition.$eduid;
        $sql =" UPDATE `education` SET 
        `school_supp`=:schoolsupp, 
        `stud_loans`=:studloan, 
        `colleg_tution`=:colltuition where `edu_id`=:edu_id";
        $stmt = $this->connection->prepare( $sql );
      
          $pdoexec = $stmt->execute( array( ":schoolsupp" => $schoosupp, ":studloan" =>$studloan , ":colltuition" =>$colltuition,':edu_id' => $eduid) );
        if( $stmt->rowCount() ){
            return $stmt->rowCount();
        }else{
           return __LINE__;
          }
      
    }
    public function updatePersonal($groceries,$clothing,$entertain,$medicals,$pet,$other,$persid){
        $sql ="UPDATE 
        `personal` SET 
        `groc_hous`=:groceries, `clothing`=:clothing, `entert`=:entertain, `medical`=:medicals, 
        `pet_supp`=:pet, `other_exp`=:other where `pers_id`=:persid";
        $stmt = $this->connection->prepare( $sql );
          $pdoexec = $stmt->execute( array( ":groceries" => $groceries, ":clothing" =>$clothing , ":entertain" =>$entertain, ":medicals" =>$medicals, ":pet" =>$pet, ":other" =>$other,":persid"=> $persid));
          if( $stmt->rowCount() ){
            return $stmt->rowCount();
        }else{
           return __LINE__;
          }
      
    }
    public function updateSavings($emergency,$investment,$retirement,$savingsid){
        $sql ="UPDATE 
        `savings`
        SET `emer_fund`=:emergency, `investment`=:investment, `retirement`=:retirement 
        where `sav_id`=:savid";
        $stmt = $this->connection->prepare( $sql );
     
          $pdoexec = $stmt->execute( array( ":emergency" => $emergency, ":investment" =>$investment , ":retirement" =>$retirement,':savid' => $savingsid ) );
          if( $stmt->rowCount() ){
            return $stmt->rowCount();
        }else{
           return __LINE__;
          }
     
    }
    public function updateTransport($carpayment,$carinsur,$gasfuel,$repairs,$transid){
        // echo $carpayment.$carinsur.$gasfuel.$repairs.$transid;
    $sql ="UPDATE `transportation`
     SET `car_pmt`=:carpmt, `car_insu`=:carinsur, `gas_fuel`=:gasfuel,
    `car_repairs`=:carrepair where `trans_id`=:transid";
        $stmt = $this->connection->prepare( $sql );
      
          $pdoexec = $stmt->execute( array( ":carpmt" => $carpayment, ":carinsur" =>$carinsur , ":gasfuel" =>$gasfuel , ":carrepair" =>$repairs, ":transid" => $transid ) );
          echo $stmt->rowCount() ;
          if( $stmt->rowCount() ){
            return $stmt->rowCount();
        }else{
           return __LINE__;
          }
      
    }
    public function updateBudget($from,$income,$other,$budgid){
      $sql ="UPDATE `budget`
      SET `budg_period_from`=:from, 
      `income`=:income, `other_income`=:other where `budg_id`=:budgid";
      $stmt = $this->connection->prepare( $sql );
        $pdoexec = $stmt->execute(array( ":from" => $from, 
        ":income" => $income, ":other" => $other , ":budgid" => $budgid));
        if( $stmt->rowCount()){
            return $stmt->rowCount();
        }else{
           return __LINE__;
          }
     
    }
}
?>