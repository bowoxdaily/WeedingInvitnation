<?php
$urls = ["http://127.0.0.1:8888/","http://127.0.0.1:8888/admin/login"];
foreach($urls as $url) {
  $c = @file_get_contents($url);
  echo $url . " => " . ($c ? strlen($c) . " bytes" : "FAIL") . "\n";
}
