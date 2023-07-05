<?php 
header('content-type: text/html; charset=utf-8');

require_once("common.php");
require_once("subject.php");
require_once("student.php");

//読み込んだhtmlファイルを組み立て
class SubjectListCtrl {
  public function __construct() {}
  public function showList() {
    $doc = load_html("timetable.html");

    $st = new Student();
    $sb = new Subject();
    $sbj = $doc->xpath('//*[@id="subjects"]');
    
    foreach($st->subjects() as $s){
      $search = "/$sb->getTitle($s)/"
      $sbj[0]->addChild('li', "<a herf=./showreview.html?subject=".$sb->getTitle($s)).">".$sb->getTitle($s))."</a>";

    }
    echo $doc->asXML();
  }
}

$mt = new Maketimetable();
//methodパラメータがmaketimetableの時に表示するっぽい
echo $mt->showList();

exit();
?>

