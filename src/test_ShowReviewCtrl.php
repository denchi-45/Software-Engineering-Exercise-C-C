<?php
// test_show_review_ctrl.php

// テスト対象のクラスファイルを読み込む
require_once("ShowReviewCtrl.php");

// スタブ: SubjectStub
class SubjectStub {
    public function getTitle($subjectId) {
        // ダミーの科目名を返す
        return "Subject " . $subjectId;
    }
}



// スタブ: StudentStub
class StudentStub {
    private $reviews = [];

    public function setReviewText($subjectId, $text) {
        // レビューテキストを保存する
        $this->reviews[$subjectId] = $text;
    }

    public function getReviewText($subjectId) {
        // 登録されているレビューテキストを返す
        return isset($this->reviews[$subjectId]) ? $this->reviews[$subjectId] : "";
    }
}

// スタブ: EditReviewCtrlStub
class EditReviewCtrlStub {
    public function edit($id) {
        // 編集メソッドのスタブの実装（今回は特に何も行わない）
    }
}

// テストケース1: show()のテスト
$SR = new ShowReviewCtrl();
$id = 1;
echo "Test for show():\n";
$st = new StudentStub();
$st->setReviewText($id,"ShowReview test text");
// ダミーのセッションをセットアップ
$_SESSION['st'] = serialize($st);
$_SESSION['sb'] = serialize(new SubjectStub());

$SR->show($id);

// テストケース2: edit()のテスト
// show()で生成された画面からボタンを押して、URLを目視で確認

// テストケース3: close()のテスト
// show()で生成された画面からボタンを押して、URLを目視で確認

?>