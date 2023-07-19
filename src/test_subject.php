<?php
//　student.phpのテストプログラム
require_once("subject.php");

$sb = new Subject();
$arrays = array(1,2,3,4,5);
$expect = array(
    1 => "インターネット技術",
    2 => "情報システム基盤技術",
    3 => "ウェブデザイン演習",
    4 => "プログラミング言語",
    5 => "HCIデザイン"
  );
$check = false;
foreach($arrays as $arr){
    if ($expect[$arr] != $sb->getTitle($arr)){
        $check = true;
    }
}
if($check){
    echo "error\n";
}else{
    echo "getTitleは正常に動いています\n";
}

?>