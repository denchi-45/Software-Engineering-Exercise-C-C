<?php
header('content-type: text/html; charset=utf-8');
// require_once("common.php");
require_once("common2.php");
require_once("student.php");
require_once("subject.php");
require_once("review.php");

class ShowReviewCtrl {

  public function __construct() {
    session_start();
    // $_SESSION['st'] = new Student();
    // $_SESSION['sb'] = new Subject();
  }

  public function show($id){
    $title_content = $_SESSION['st']->getTitle($id);
    $review_content = $_SESSION['sb']->getReviewText($id);

    $doc = load_html2("review_display.html");
    $title = $doc->getElementById('title');
    $title->nodeValue = $title_content;

    $review = $doc->getElementById('review');
    $review->nodeValue = $review_content;
    

    // $this->id = $id;
    $html = $doc->saveHTML();
    echo $html;
    
    
    // $sbj = $doc->xpath('//*[@id="title"]');
    // $rev = $doc->xpath('//*[@id="text"]');
    
    // $sbj[0]->addChild('h1',$title);
    // $rev[0]->addChild('textarea',$review);

    // echo $doc->asXML();
    
  }
  public function edit($id){
    $ed = new EditReviewCtrl();
    $ed->edit($id);
  }
  public function close(){
    $sb = new SubjectListCtrl();
    $sb->showList();
  }
}

$sr = new ShowReviewCtrl();
//methodパラメータがmaketimetableの時に表示するっぽい
if($_GET['method'] == "close"){
  $sr->close();
}else if($_GET['id']){
  $sr->edit($_GET['id']);
}


// exit();
?>
