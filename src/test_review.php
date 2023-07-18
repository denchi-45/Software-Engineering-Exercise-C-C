<?php
// test_review.php

// テスト対象のクラスファイルを読み込む
require_once("review.php");

// テストケース1: コンストラクタとgetText()のテスト
$subjectId = 1;
$text = "This is a review.";
$review = new Review($subjectId, $text);
$actualSubjectId = $review->subjectid;
$actualText = $review->getText();

if ($actualSubjectId === $subjectId && $actualText === $text) {
    echo "Test case 1 passed.\n";
} else {
    echo "Test case 1 failed.\n";
}

// テストケース2: setText()とgetText()のテスト
$subjectId = 2;
$text = "Another review.";
$review = new Review($subjectId, "");
$review->setText($text);
$actualSubjectId = $review->subjectid;
$actualText = $review->getText();

if ($actualSubjectId === $subjectId && $actualText === $text) {
    echo "Test case 2 passed.\n";
} else {
    echo "Test case 2 failed.\n";
}

?>





