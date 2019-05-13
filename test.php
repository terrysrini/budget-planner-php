<?php
class Cars{
    var $wheelcount=4;
    private $wheelrun=200;
    protected static $doors=23;
    function greeting(){
        // echo $this;
    return "This is the wheel count". $this->wheelcount;
    }
}
class Wheels extends Cars{
    var $wheelcount=100;
    
    function greeting1(){
        return "This is the greeting 1";
    }
}

// $my_classes=get_declared_classes();
// foreach($my_classes as $classes){
//     echo "$classes"."<br/>";
// }
// $my_methods=get_class_methods('Cars');
// // echo $my_methods;
// foreach($my_methods as $methods){
//     echo $methods . "<br/>";
// }
$wheelmethod=new Wheels();
echo $wheelmethod->wheelrun."<br/>";
echo $wheelmethod->wheelcount. "<br/>";
echo $wheelmethod->greeting1(). "<br/>";
$my_methods=new Cars();
$my_methods->wheelcount=10;
echo $my_methods->wheelcount . "<br/>";
echo $my_methods->greeting();
echo Cars::$doors
?>