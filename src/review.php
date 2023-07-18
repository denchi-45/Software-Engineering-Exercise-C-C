<?php
class Review {
    public $subjectId;
    private $text;
    public function __construct($subjectid,$text) {
        $this->subjectId = $subjectid;
        $this->text = $text;
    }
    
    // public function __construct() {
        // $this->subjectid = $id;
        // $this->text = $t;
    // }
    public function setText($string){
        $this->text = $string;

    }
    public function getText(){
        return $this->text;
    }
}
?>
