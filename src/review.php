<?php
class Review {
    private $subjectid;
    private $text;
    public function __construct($subjectid,$text) {
        $this->subjectid = $subjectid;
        $this->text = $text;
    }
    public function setText($string){
        $this->text = $string;

    }
    public function getText(){
        return $this->text;
    }
}
?>
