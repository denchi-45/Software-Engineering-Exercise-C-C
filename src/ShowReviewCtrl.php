<?php
header('content-type: text/html; charset=utf-8');
// require_once("common.php");
require_once("common2.php");
require_once("student.php");
require_once("subject.php");
require_once("review.php");

class ShowReviewCtrl {
    
  public function show($id){
    $sb = new Subject();
    $st = new Student();
    $title_content = $sb->getTitle($id);
    $review_content = $st->getReviewText($id);

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
    
  }
  public function close($id){
    $sb = new Subject();
    $sb.showList();
  }
}

$mt = new ShowReviewCtrl();
//methodパラメータがmaketimetableの時に表示するっぽい
echo $mt->show($_GET['id']);

exit();
?>
