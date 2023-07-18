<?php
//htmlをロードするファイル
function load_html2($file){
  $dom = new DOMDocument();
  $dom->loadHTMLFile($file);
  return $dom;
}

?>