<?php 
session_start();
header('content-type: text/html; charset=utf-8');

require_once("common.php");
require_once("common2.php");
require_once("subject.php");
require_once("student.php");
require_once("EditReviewCtrl.php");
require_once("ShowReviewCtrl.php");
//読み込んだhtmlファイルを組み立て
class SubjectListCtrl {
  public function __construct() {
    
    if(!isset($_SESSION['st'])){
      $st = new Student();
      $_SESSION['st'] = serialize($st);
    }
    if(!isset($_SESSION['sb'])){
      $sb = new Subject();
      $_SESSION['sb'] = serialize($sb);
    }
  
  }
  public function showList() {
    $st = unserialize($_SESSION['st']);
    $sb = unserialize($_SESSION['sb']);
    $doc = load_html("./subject_display.html");
    $sbj = $doc->xpath('//*[@id="subjects"]');
    
    foreach($st->subjects() as $s){
      $li = $sbj[0]->addChild('li');
     
      if($st->getReviewText($s) === "hello"){
        $tmp = $li->addChild('a', $sb->getTitle($s));
        $tmp->addAttribute('href',"./SubjectListCtl.php?new_id=".$s);
      }else{
        $tmp = $li->addChild('a', "{$sb->getTitle($s)} (レビューあり)");
        $tmp->addAttribute('href',"./SubjectListCtl.php?show_id=".$s);
      }
    }
    echo $doc->asXML();
  }

  public function new($id){
    $erc = new EditReviewCtrl();
    $erc->new($id);
  }

  public function show($id){
      $SRC = new ShowReviewCtrl();
      $SRC->show($id);
  }
}

$mt = new SubjectListCtrl();
// methodパラメータがmaketimetableの時に表示するっぽい
if($_GET['method'] == "showList"){
  echo $mt->showList();
}else if($_GET['show_id']){
  echo $_GET['show_id'];
  $mt->show($_GET['show_id']);
}else if($_GET['new_id']){
  $mt->new($_GET['new_id']);
}else{
  echo "<html>error:unknown_method</html>";
}

?>

