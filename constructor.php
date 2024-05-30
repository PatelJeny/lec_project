<?php
class mobile{
    public $name;
    public $color;

    function __construct($rname,$rcolor)
    {
        $this->name=$rname;
        $this->color=$rcolor;
    }
    function checkMyColor(){
        if($this->color=="red"){
            echo($this->name);
        }
    }
}
$m1 = new mobile("mobile1","green");
$m2 = new mobile("mobile2","red");
$m3 = new mobile("mobile3","green");
$m4 = new mobile("mobile4","black");
$m5 = new mobile("mobile5","white");

$array = array($m1,$m2,$m3,$m4,$m5);


foreach ($array as $mobile) {
  
    $mobile->checkMyColor();
 
 }
?>