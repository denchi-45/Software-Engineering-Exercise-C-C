<?php
class Subject {
  //studentのデータを保持
  public $subjects = array(

  1 => "インターネット技術",
  2 => "情報システム基盤技術",
  3 => "ウェブデザイン演習",
  4 => "プログラミング言語",
  5 => "HCIデザイン"
);
  public function getIitle($id){
    $subject_name = $this->subjects[$id];
    return $subject_name;
  }
}
?>
