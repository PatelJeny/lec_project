<?php
class human{

    const hairColor="black";
    private $adhar="1509";

    public function setAdhar($newAdharNumber){
        $this->adhar=$newAdharNumber;
    }
    public function getAdhar(){
        return $this->adhar;
    }
    public function getHairColor(){
        return self::hairColor;
    }
}

$jeny = new human();
$jeny->setAdhar("5555");
echo ($jeny->getAdhar());
echo(human::hairColor);

?>