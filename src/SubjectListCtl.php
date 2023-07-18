<?php 
header('content-type: text/html; charset=utf-8');

require_once("common.php");
require_once("common2.php");
require_once("subject.php");
require_once("student.php");
// require_once("EditReviewCtrl.php");
// require_once("ShowReviewCtrl.php");
//読み込んだhtmlファイルを組み立て
class SubjectListCtrl {
  private $st;
  private $sb;
  public function __construct() {
    $this->st = new Student();
    $this->sb = new Subject();
  }
  public function showList() {
    // echo "EHHHHH";
    $doc = load_html("./subject_display.html");
    $sbj = $doc->xpath('//*[@id="subjects"]');
    
    foreach($this->st->subjects() as $s){
      // $sbj[0]->addChild('li', "<a herf=./showreview.html?subject=".$sb->getTitle($s).">".$sb->getTitle($s)."</a>");
      $li = $sbj[0]->addChild('li');
      $tmp = $li->addChild('a', $this->sb->getTitle($s));
      if($this->st->getReviewText($s) === "hello"){
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

    // $doc = load_html("subject_display.html");

    // $st = new Student();
    // $sb = new Subject();
    // $sbj = $doc->xpath('//*[@id="subjects"]');
    
    // foreach($st->subjects() as $s){
    //   // $sbj[0]->addChild('li', "<a herf=./showreview.html?subject=".$sb->getTitle($s).">".$sb->getTitle($s)."</a>");
    //   $li = $sbj[0]->addChild('li');
    //   $tmp = $li->addChild('a', $sb->getTitle($s));
    //   // $tmp->addAttribute('href',"./showreview.php?id=".$s);
    //   $tmp->addAttribute('href',"./SubjectListCtrl.php/?id=".$s);

    // }
    // echo $doc->asXML();
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
  $mt->show($_GET["id"]);
}else if($_GET['new_id']){
  $mt->new($_GET['new_id']);
}else{
  echo "<html>error:unknown_method</html>";
}
// echo "HELLOW ORLD";
// exit();
?>

