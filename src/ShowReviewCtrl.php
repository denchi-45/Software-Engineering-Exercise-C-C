<?php

//header('content-type: text/html; charset=utf-8');
require_once("common.php");
require_once("student.php");
require_once("subject.php");
require_once("review.php");

class ShowReviewCtrl {
    
  public function show($id){
    $sb = new Subject();
    $st = new Student();
    $title = $sb->getTitle($id);
    $review = $st->getReviewText($id);

    $doc = load_html("ShowReview.html");
    
    $sbj = $doc->xpath('//*[@id="title"]');
    $rev = $doc->xpath('//*[@id="text"]');
    
    $sbj[0]->addChild('h1',$title);
    $rev[0]->addChild('textarea',$review);

    echo $doc->asXML();
    
  }
  public function edit($id){
    
  }
  public function close($id){
    $sb = new SubjectListCtrl();
    $sb->showList();
  }
}

$mt = new ShowReviewCtrl();
//methodパラメータがmaketimetableの時に表示するっぽい
if ($_GET['id']){
  echo $mt->show($_GET['id']);
}else{
  echo "<html>error:unknown_method</html>";
}
exit();
?>
