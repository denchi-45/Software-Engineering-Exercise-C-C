<?php
// test_subject_list_ctrl.php

// テスト対象のクラスファイルを読み込む
require_once("SubjectListCtl.php");

// テスト用のダミークラスを定義（スタブ）
class StudentStub {
    public function subjects() {
        // ダミーの科目ID配列を返す
        return array(1, 2, 3);
    }

    public function getReviewText($subjectId) {
        // レビューテキストをダミーで返す
        return "hello"; // レビューテキストが"hello"の場合のテストをシミュレート
    }
}

class SubjectStub {
    public function getTitle($subjectId) {
        // ダミーの科目名を返す
        return "Subject " . $subjectId;
    }
}

// テスト対象のSubjectListCtrlクラスのインスタンスを生成
$subjectListCtrl = new SubjectListCtrl();

// ダミーのセッションをセットアップ
$_SESSION['st'] = serialize(new StudentStub());
$_SESSION['sb'] = serialize(new SubjectStub());

// テストメソッドを呼び出して結果を確認
echo "Test for showList(): ";
$subjectListCtrl->showList();

// 他のテストケースも同様に記述する

?>