<?php 
header('content-type: text/html; charset=utf-8');

require_once("subject.php");
require_once("student.php");
require_once("common2.php");
require_once("review.php");

//読み込んだhtmlファイルを組み立て
class EditReviewCtrl {
  private $id;
  // private $st = new Student();
  public function __construct() {
    session_start();
    // $_SESSION['st'] = new Student();
    // $_SESSION['sb'] = new Subject();
  }
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
    $doc = load_html2("review_create.html");
    $title = $doc->getElementById('title');
    $title->nodeValue = $_SESSION['sb']->getTitle($id);
    $this->id = $id;
    $html = $doc->saveHTML();
    echo $html;
    // $title_tag = $doc->xpath('//*[@id="title"]');
    // $title_tag->get
    // $title_tag[0]->addChild('h1',$sb->getTitle($id));
    
    // echo $doc->asXML();
    // $this->st->getTitle()
  }

  public function save($id,$text){
    $_SESSION['st']->setReviewText($id,$text);
  }

  public function cancel(){
     // ステータスコードを出力
	http_response_code( 301 );
	// リダイレクト
	header( "Location: ./SubjectListCtrl.php/?method=showList" );
  }

  public function edit($id){
    $doc = load_html2("review_create.html");
    $title = $doc->getElementById('title');
    $title->nodeValue = $_SESSION['sb']->getTitle($id);
    $this->id = $id;
    $html = $doc->saveHTML();
    echo $html;
  }
}

// $ERB = new EditReviewCtrl();
// // //methodパラメータがmaketimetableの時に表示するっぽい
// if($_GET['method'] === "new"){
//   // echo $ERB->new();
// }else 
if($_GET['method'] == "save"){
  $ERB->save($this->id,$_POST["review"]);
}
// else if($_GET['method'] == "cancel"){
//   $ERB->cancel();
// }else{
//   echo "<html>error:unknown_method</html>";
// }
// exit();
?>

