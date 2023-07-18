<?php
//htmlをロードするファイル
function load_html2($file){
  $dom = new DOMDocument();
  $dom->loadHTML(file_get_contents($file));
  return $dom;
}

?>