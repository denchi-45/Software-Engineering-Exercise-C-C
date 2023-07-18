<?php
class Subject{
  //studentのデータを保持
  public $subjects = array(

  1 => "インターネット技術",
  2 => "情報システム基盤技術",
  3 => "ウェブデザイン演習",
  4 => "プログラミング言語",
  5 => "HCIデザイン"
);
  public function getTitle($id){
    $subject_name = $this->subjects[$id];
    return $subject_name;
  }
}

// $test_sub = new Subject();

// if($_GET['id'] != ""){
//   echo $test_sub->getTitle($_GET['id']);
// }else{
//   echo "<html>error:unknown_method</html>";
// }
// exit();
?>
