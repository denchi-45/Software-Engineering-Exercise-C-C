<?php
header('content-type: text/html; charset=utf-8');
require_once("common.php");
require_once("student.php");
require_once("subject.php");
require_once("review.php");

class ShowReviewCtrl {
    
  public function show($id){
    $sb = new Subject();
    $st = new Subject();
    $sb->getTitle($id);
    $st->getReviewText($id);

    
  }
  public function edit($id){

  }
  public function close($id){

  }
}
?>
