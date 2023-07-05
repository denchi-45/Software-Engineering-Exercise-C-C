<?php
require_once("./Review.php");

class Student {
    private $ids = array(1,2,3,4,5);
    private $reviews = array();
    private $studentNo = 1;

    public function __construct(){
        foreach ( $this ->ids as $id){
            $this ->reviews[] = new Review();
        }
    }

    public function subjects() {
        return $this->ids;
    }
    public function getReviewText(int $id) {
        foreach ($this->reviews as $review){
            if ($review->subjectId == $id){
                return $review->text;
            }
        }
    }
    public function setReviewText(int $id, string $text){
        foreach ($this->reviews as $review){
            if ($review->subjectId == $id){
                $review->text = $text;
            }
        }
    }
}
?>
