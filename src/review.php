<?php
class Review {
    private $subjectid;
    private $text = "review";
    public function __construct() {
        // $this->subjectid = $id;
        // $this->text = $t;
    }
    public function setText($string){
        $this->text = $string;

    }
    public function getText(){
        return $this->text;
    }
}
?>
