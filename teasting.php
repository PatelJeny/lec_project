<?php
class mobile{
    public $name;
    public $colour;

    function set_name($name){
        $this->name=$name;
    }
    function get_name(){
        return $this->name;
    }
}
$vivo=new mobile();
$oppo=new mobile();
$vivo->set_name('vivo');
$oppo->set_name('oppo');

echo $vivo->get_name();
echo "<br>";
echo $oppo->get_name();
?>