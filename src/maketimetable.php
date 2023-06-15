<?php 
header('content-type: text/html; charset=utf-8');

require_once("common.php");
require_once("student.php");

class Maketimetable {
  public function __construct() {}
  public function maketimetable() {
    $doc = load_html("timetable.html");

    $st = new Student();
    $sbj = $doc->xpath('//*[@id="subjects"]');
    foreach($st->subjects as $s){
      $sbj[0]->addChild('li', $s);
    }

    echo $doc->asXML();
  }
}

$mt = new Maketimetable();
if($_GET['method'] === "maketimetable"){
  echo $mt->maketimetable();
}else{
  echo "<html>error:unknown_method</html>";
}

exit();
?>
