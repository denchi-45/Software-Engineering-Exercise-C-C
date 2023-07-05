<?php 
header('content-type: text/html; charset=utf-8');

require_once("common.php");
require_once("subject.php");
require_once("student.php");

//読み込んだhtmlファイルを組み立て
class Maketimetable {
  public function __construct() {}
  public function maketimetable() {
    $doc = load_html("timetable.html");

    $st = new Student();
    $sb = new Subject();
    $sbj = $doc->xpath('//*[@id="subjects"]');
    foreach($st->subjects() as $s){
      $sbj[0]->addChild('li', $sb->getTitle($s));
    }

    echo $doc->asXML();
  }
}

$mt = new Maketimetable();
//methodパラメータがmaketimetableの時に表示するっぽい
if($_GET['method'] === "maketimetable"){
  echo $mt->maketimetable();
}else{
  echo "<html>error:unknown_method</html>";
}

exit();
?>

