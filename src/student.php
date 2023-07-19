<?php
require_once("./review.php");

class Student {
    private $ids = array(1,2,3,4,5);
    public $reviews = array();
    private $studentNo = 1;
    
    public function __construct(){
        foreach($this->ids as $id){
            $this->reviews[$id] = new Review($id,"hello");
        }
    }

    public function subjects() {
        return $this->ids;
    }
    public function getReviewText($id) {
        return $this->reviews[$id]->getText();
    }
    public function setReviewText($id, $text){
        foreach ($this->reviews as $review){
            if ($review->subjectid == $id){
                $this->reviews[$id]->setText($text);
            }
        }
    }
}

?>
