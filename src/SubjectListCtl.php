<?php 
header('content-type: text/html; charset=utf-8');

require_once("common.php");
require_once("subject.php");
require_once("student.php");
require_once("EditReviewCtrl.php");
//読み込んだhtmlファイルを組み立て
class SubjectListCtrl {
  public function __construct() {}
  public function showList() {
    $doc = load_html("timetable.html");

    $st = new Student();
    $sb = new Subject();
    $sbj = $doc->xpath('//*[@id="subjects"]');
    
    foreach($st->subjects() as $s){
      // $sbj[0]->addChild('li', "<a herf=./showreview.html?subject=".$sb->getTitle($s).">".$sb->getTitle($s)."</a>");
      $li = $sbj[0]->addChild('li');
      $tmp = $li->addChild('a', $sb->getTitle($s));
      $tmp->addAttribute('href',"./showreview.php?id=".$s);

    }
    echo $doc->asXML();
  }

  public function new($id){
    $erc = new EditReviewCtrl();
    $erc->new($id);

    $doc = load_html("timetable.html");

    $st = new Student();
    $sb = new Subject();
    $sbj = $doc->xpath('//*[@id="subjects"]');
    
    foreach($st->subjects() as $s){
      // $sbj[0]->addChild('li', "<a herf=./showreview.html?subject=".$sb->getTitle($s).">".$sb->getTitle($s)."</a>");
      $li = $sbj[0]->addChild('li');
      $tmp = $li->addChild('a', $sb->getTitle($s));
      $tmp->addAttribute('href',"./showreview.php?id=".$s);

    }
    echo $doc->asXML();
  }
}

$mt = new SubjectListCtrl();
//methodパラメータがmaketimetableの時に表示するっぽい
if($_GET['method'] === "showList"){
  echo $mt->showList();
}else{
  echo "<html>error:unknown_method</html>";
}
exit();
?>

