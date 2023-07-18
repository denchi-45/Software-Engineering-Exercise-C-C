<?php
require_once("./review.php");

class Student {
    private $ids = array(1,2,3,4,5);
    private $reviews = array();
    private $studentNo = 1;
    
    public function __construct(){
        foreach ( $this ->ids as $id){
            $this ->reviews[$id] = new Review($id,"hello");
        }
    }

    public function subjects() {
        return $this->ids;
    }
    public function getReviewText($id) {
        // foreach ($this->reviews as $review){
        //     return $this->reviews[$id]->getText();
            
        // }
        return $this->reviews[$id]->getText();
    }
    public function setReviewText($id, $text){
        foreach ($this->reviews as $review){
            if ($review->subjectId == $id){
                $this->reviews[$id]->setText($text);
            }
        }
    }
}

// function console_log($data){
//     echo '<script>';
//     echo 'console.log('.json_encode($data).')';
//     echo '</script>';
// }

//$test_student = new Student();

// if($test_student->subjects() == array(1,2,3,4,5)){
//     console_log("ok");
// }

?>
