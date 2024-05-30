<?php
include 'dbconfig';

class movie{
    private $id,$name,$description,$image,$release_date,$is_deleted;

    function __construct( $id,$name,$description,$image,$release_date,$is_deleted)
    {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->image=$image;
        $this->release_date=$release_date;
        $this->is_deleted=$is_deleted;
    }
    public function insert(){
        global $conn;
        $conn->query("INSERT INTO movie values('$this->id','$this->name','$this->description','$this->image','$this->release_date',' $this->is_deleted')");
    }
}
$m1= new movie('111','test','d1','1.png','2002-02-02','false');
$m1->insert()
?>