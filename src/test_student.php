<?php
//　student.phpのテストプログラム
require_once("student.php");

$st = new Student();

//subject()のテスト
if($st->subjects() === array(1,2,3,4,5)){
    echo "subject() test ok\n";
}

//getReviewText()のテスト
foreach($st->subjects() as $id){
    echo $st->getReviewText($id);
    echo "\n";
}

//setReviewText()のテスト
foreach($st->subjects() as $id){
    $st->setReviewText($id,"After editing\n");
}

foreach($st->subjects() as $id){
    echo $st->getReviewText($id);
}

?>