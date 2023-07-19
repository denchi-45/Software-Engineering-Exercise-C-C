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
  }

  public function show($id){
    $st = unserialize($_SESSION['st']);
    $sb = unserialize($_SESSION['sb']);
    $title_content = $sb->getTitle($id);
    $review_content = $st->getReviewText($id);

    $doc = load_html2("review_display.html");
    $title = $doc->getElementById('title');
    $title->nodeValue = $title_content;

    $ID = $doc->getElementById('id');
    $ID->setAttribute('value',$id);

    $review = $doc->getElementById('review');
    $review->nodeValue = $review_content;
  
    $html = $doc->saveHTML();
    echo $html;
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

?>
