<?php 
class CreateBudget{
    private $connection;
    public function __construct($conn){
    $this->connection=$conn;
    }
    public function insertHousing($mortgage,$hoafees,$rent,$homeins,$repair,$watergas,$cabletv,$phonecall){
        $sql ="INSERT INTO `housing`( `mortgage`, `hoa`, `rent`, `homeins`, `repair_main`, `watgasele`, `cabtvinternet`, `phonecell`) VALUES (:mortgage,:hoafees,:rent,:homeins,:repair,:watgas,:cabtv,:phonecel)";
        $stmt = $this->connection->prepare( $sql );
        if( $stmt ){
          $pdoexec = $stmt->execute( array( ":mortgage" => $mortgage, ":hoafees" =>$hoafees , ":rent" =>$rent,":homeins" => $homeins, ":repair" =>$repair, ":watgas" =>$watergas, ":cabtv" =>$cabletv, ":phonecel" =>$phonecall) );
          if( $pdoexec ){
            $id = $this->connection->lastInsertId();
            return $id;
          }else{
           return 'error';
          }
      } else {
          return "error";
      }
    }
    public function insertEducation($schoosupp,$studloan,$colltuition){
       
        $sql =" INSERT INTO `education`( `school_supp`, `stud_loans`, `colleg_tution`) VALUES (:schoolsupp,:studloan,:colltuition)";
        $stmt = $this->connection->prepare( $sql );
        if( $stmt ){
          $pdoexec = $stmt->execute( array( ":schoolsupp" => $schoosupp, ":studloan" =>$studloan , ":colltuition" =>$colltuition) );
          if( $pdoexec ){
            $id = $this->connection->lastInsertId();
            return $id;
          }else{
           return 'error';
          }
      } else {
          return "error";
      }
    }
    public function insertPersonal($groceries,$clothing,$entertain,$medicals,$pet,$other){
        $sql ="INSERT INTO `personal`( `groc_hous`, `clothing`, `entert`, `medical`, `pet_supp`, `other_exp`) VALUES (:groceries,:clothing,:entertain,:medicals,:pet,:other)";
        $stmt = $this->connection->prepare( $sql );
        if( $stmt ){
          $pdoexec = $stmt->execute( array( ":groceries" => $groceries, ":clothing" =>$clothing , ":entertain" =>$entertain, ":medicals" =>$medicals, ":pet" =>$pet, ":other" =>$other ) );
          if( $pdoexec ){
            $id = $this->connection->lastInsertId();
            return $id;
          }else{
           return 'error';
          }
      } else {
          return "error";
      }
    }
    public function insertSavings($emergency,$investment,$retirement){
        $sql ="INSERT INTO `savings`(`emer_fund`, `investment`, `retirement`) VALUES (:emergency,:investment,:retirement)";
        $stmt = $this->connection->prepare( $sql );
        if( $stmt ){
          $pdoexec = $stmt->execute( array( ":emergency" => $emergency, ":investment" =>$investment , ":retirement" =>$retirement ) );
          if( $pdoexec ){
            $id = $this->connection->lastInsertId();
            return $id;
          }else{
           return 'error';
          }
      } else {
          return "error";
      }
    }
    public function insertTransport($carpayment,$carinsur,$gasfuel,$repairs){
    $sql ="INSERT INTO `transportation`(`car_pmt`, `car_insu`, `gas_fuel`, `car_repairs`) VALUES (:carpmt,:carinsur,:gasfuel,:carrepair)";
        $stmt = $this->connection->prepare( $sql );
        if( $stmt ){
          $pdoexec = $stmt->execute( array( ":carpmt" => $carpayment, ":carinsur" =>$carinsur , ":gasfuel" =>$gasfuel , ":carrepair" =>$repairs ) );
          if( $pdoexec ){
            $id = $this->connection->lastInsertId();
            return $id;
          }else{
           return 'error';
          }
      } else {
          return "error";
      }
    }
    
    public function insertBudget($from,$income,$other,$eduid,$housid,$personid,$savid,$transid){
      $sql ="INSERT INTO `budget`(`budg_period_from`, `income`, `other_income`,`edu_id`, `hous_id`, `person_id`, `sav_id`, `trans_id`) VALUES (:from,:income,:other,:eduid,:housid,:personid,:savid,:transid)";
      $stmt = $this->connection->prepare( $sql );
      if( $stmt ){
        $pdoexec = $stmt->execute( array( ":from" =>$from  , ":income" =>$income, ":other" => $other, ":eduid" =>$eduid, ":housid" =>$housid, ":personid" =>$personid, ":savid" =>$savid, ":transid" =>$transid ) );
        if( $pdoexec ){
            $id = $this->connection->lastInsertId();
            return $id;
          }else{
           return 'error';
          }
      } else {
          return "error";
      }
    }
    
    public function getOneBudget($id){
        $sql = "SELECT *,(j.school_supp+j.stud_loans+j.colleg_tution) as schooling,(h.mortgage+h.hoa+h.rent+h.homeins+h.repair_main+h.watgasele+ h.cabtvinternet+ h.phonecell) as housings,(p.groc_hous+p.clothing+p.entert+p.medical+p.pet_supp+p.other_exp) as personals, (s.emer_fund+s.investment+s.retirement) as savings,(t.car_pmt+t.car_insu+t.gas_fuel+t.car_repairs) as transport FROM `budget` b join education as j on b.edu_id=j.edu_id join housing as h on b.hous_id=h.house_id join personal as p on p.pers_id=b.person_id join savings as s on s.sav_id=b.sav_id join transportation as t on t.trans_id=b.trans_id where budg_id=$id";
        $stmt = $this->connection->query( $sql )->fetchAll();
       
        if( !$stmt ){
            return 'error';
        }
        else{
            return $stmt;
        }
    }

    public function getDateBudget($date){
     
        $sql = "SELECT *,(j.school_supp+j.stud_loans+j.colleg_tution) as schooling,(h.mortgage+h.hoa+h.rent+h.homeins+h.repair_main+h.watgasele+ h.cabtvinternet+ h.phonecell) as housings,(p.groc_hous+p.clothing+p.entert+p.medical+p.pet_supp+p.other_exp) as personals, (s.emer_fund+s.investment+s.retirement) as savings,(t.car_pmt+t.car_insu+t.gas_fuel+t.car_repairs) as transport FROM `budget` b join education as j on b.edu_id=j.edu_id join housing as h on b.hous_id=h.house_id join personal as p on p.pers_id=b.person_id join savings as s on s.sav_id=b.sav_id join transportation as t on t.trans_id=b.trans_id where budg_period_from LIKE '%".$date."%'";
        $stmt = $this->connection->query( $sql )->fetchAll();
        return $stmt;
      
    }
    
    public function deleteBudget($id){
        $sql = "DELETE from `budget` where `budg_id`=:id";
        $q = $this->connection->prepare($sql);
        $response = $q->execute(array(":id" => $id));
        return $response;                

    }
    public function getAllBudget(){
        $sql = "SELECT b.budg_id,b.budg_period_from,b.income,b.other_income,(j.school_supp+j.stud_loans+j.colleg_tution) as schooling,(h.mortgage+h.hoa+h.rent+h.homeins+h.repair_main+h.watgasele+ h.cabtvinternet+ h.phonecell) as housings,(p.groc_hous+p.clothing+p.entert+p.medical+p.pet_supp+p.other_exp) as personals, (s.emer_fund+s.investment+s.retirement) as savings,(t.car_pmt+t.car_insu+t.gas_fuel+t.car_repairs) as transport FROM `budget` b join education as j on b.edu_id=j.edu_id join housing as h on b.hous_id=h.house_id join personal as p on p.pers_id=b.person_id join savings as s on s.sav_id=b.sav_id join transportation as t on t.trans_id=b.trans_id";
        $stmt = $this->connection->query( $sql )->fetchAll();
       
        if( !$stmt ){
            return 'error';
        }
        else{
            return $stmt;
        }
    }
}

?>