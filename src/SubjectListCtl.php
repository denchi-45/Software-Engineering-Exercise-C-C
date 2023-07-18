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
  // private $st;
  // private $sb;
  public function __construct() {
    if(!isset($_SESSION['st'])){
      $st = new Student();
      $_SESSION['st'] = serialize($st);
    }
    if(!isset($_SESSION['sb'])){
      $sb = new Subject();
      $_SESSION['sb'] = serialize($sb);
    }
   
  
    // $this->st = new Student();
    // $this->sb = new Subject();
  }
  public function showList() {
    
    $doc = load_html("./subject_display.html");
    $sbj = $doc->xpath('//*[@id="subjects"]');
    
    foreach($_SESSION['st']->subjects() as $s){
      // $sbj[0]->addChild('li', "<a herf=./showreview.html?subject=".$sb->getTitle($s).">".$sb->getTitle($s)."</a>");
      $li = $sbj[0]->addChild('li');
      $tmp = $li->addChild('a', $_SESSION['sb']->getTitle($s));
      if($_SESSION['st']->getReviewText($s) === "hello"){
        $tmp->addAttribute('href',"./SubjectListCtl.php?new_id=".$s);
      }else{
        $tmp->addAttribute('href',"./SubjectListCtl.php?show_id=".$s);
        $txt = $tmp->addChild('p',"with reviews");
      }
      

    }
    echo $doc->asXML();
  }

  public function new($id){
    $erc = new EditReviewCtrl();
    $erc->new($id);
  }

  public function show($id){
      // $doc = load_html2("review_display.html");
      $SRC = new ShowReviewCtrl();
      $SRC->show($id);
      // $subject = $SRC.getTitle($id);
      // $review = $SRC.getReviewText($id);

      // $title = $doc->getElementById('title');
      // $title->nodeValue = $review;

      // $title = $doc->getElementById('review');
      // $title->nodeValue = $review;

      // $html = $doc->saveHTML();
      // echo $html;
  }
}

$mt = new SubjectListCtrl();

// $mt->showList();

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

