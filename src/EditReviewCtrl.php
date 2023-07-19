<?php 
error_reporting(0);
header('content-type: text/html; charset=utf-8');

require_once("subject.php");
require_once("student.php");
require_once("common2.php");
require_once("review.php");

// 読み込んだhtmlファイルを組み立て
class EditReviewCtrl {
  public $id;
  public function __construct() {
    session_start();
  }

  public function new($id){
    $sb = unserialize($_SESSION['sb']);
    $doc = load_html2("review_create.html");
    $title = $doc->getElementById('title');
    $title->nodeValue = $sb->getTitle($id);
    $ID = $doc->getElementById('id');
    $ID->setAttribute('value',$id);

    $html = $doc->saveHTML();
    echo $html;
  }

  public function save($id,$text){
    // echo $id;
    // echo $text;
    $st = unserialize($_SESSION['st']);
    $st->setReviewText($id,$text);

    $_SESSION['st'] = serialize($st);
    $st = unserialize($_SESSION['st']);

  }

  public function cancel(){
     // ステータスコードを出力
	http_response_code( 301 );
	// リダイレクト
	header( "Location: ./SubjectListCtl.php?method=showList" );
  }

  public function edit($id){
    $sb = unserialize($_SESSION['sb']);
    $st = unserialize($_SESSION['st']);
    $this->id = $id;
    $doc = load_html2("review_create.html");
    $title = $doc->getElementById('title');
    $title->nodeValue = $sb->getTitle($id);
    $review = $doc->getElementById('review');
    $review->nodeValue = $st->getReviewText($id);
    $html = $doc->saveHTML();
    echo $html;
  }
}

$ERB = new EditReviewCtrl();
if($_GET['method'] == "save"){
  $ERB->save($_POST["id"],$_POST["review"]);
  $ERB->cancel();
}else if($_GET['method'] == "cancel"){
  $ERB->cancel();
}
?>

