<?php
error_reporting(-1);
ini_set("display_errors", 1);

require "functions/global.php";

$keywords   = '';
$start_date = '';
$end_date   = '';
$avg = 0;
$test = 0;

if (!empty($_POST) || $test == 1) {
  $keywords   = !(empty($_POST['keywords'])) ?  $_POST['keywords']: '';
  $start_date = !(empty($_POST['start_date'])) ?  $_POST['start_date']: '';
  $end_date   = !(empty($_POST['end_date'])) ?  $_POST['end_date']: '';


  require "services/search.php";  
  echo $apicall."<br><br>";
}

$view = "views/index_view.php";
require "views/layouts/main-layout.php";
?>
