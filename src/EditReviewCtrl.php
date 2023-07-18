<?php 
header('content-type: text/html; charset=utf-8');

require_once("subject.php");
require_once("student.php");
require_once("common.php");
require_once("review.php");

//読み込んだhtmlファイルを組み立て
class EditReviewCtrl {
  // private $st = new Student();
  public function __construct() {}
  // public function showList() {
  //   $doc = load_html("timetable.html");

  //   $st = new Student();
  //   $sb = new Subject();
  //   $sbj = $doc->xpath('//*[@id="subjects"]');
    
  //   foreach($st->subjects() as $s){
  //     // $sbj[0]->addChild('li', "<a herf=./showreview.html?subject=".$sb->getTitle($s).">".$sb->getTitle($s)."</a>");
  //     $li = $sbj[0]->addChild('li');
  //     $tmp = $li->addChild('a', $sb->getTitle($s));
  //     $tmp->addAttribute('href',"./showreview.php?id=".$s);

  //   }
  //   echo $doc->asXML();
  // }
  public function new($id){
    $sb = new Subject();
    
    $doc = load_html("review_create.html");
    $title_tag = $doc->xpath('//*[@id="title"]');
    $title_tag[0]->addChild('h1',$sb->getTitle($id));
    
    echo $doc->asXML();
    // $this->st->getTitle()
  }

  public function setReviewText($id,$text){
    $rv = new Review();
    $rv->setText($text);
  }
}

// $ERB = new EditReviewCtrl();
// //methodパラメータがmaketimetableの時に表示するっぽい
// if($_GET['method'] === "new"){
//   // echo $ERB->new();
// }else{
//   echo "<html>error:unknown_method</html>";
// }
// exit();
?>

