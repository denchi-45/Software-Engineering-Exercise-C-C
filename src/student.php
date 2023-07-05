<?php
require_once("./review.php");

class Student {
    private $ids = array(1,2,3,4,5);
    private $reviews = array();
    private $studentNo = 1;

    public function __construct(){
        foreach ( $this ->ids as $id){
            $this ->reviews[$id] = new Review();
        }
    }

    public function subjects() {
        return $this->ids;
    }
    public function getReviewText(int $id) {
        foreach ($this->reviews as $review){
            return $this->reviews[$id]->getText();
        }
    }
    public function setReviewText(int $id, string $text){
        foreach ($this->reviews as $review){
            if ($review->subjectId == $id){
                $this->reviews[$id]->setText($text);
            }
        }
    }
}
?>
