<?php
$urls = [
  "http://127.0.0.1:8888/admin/login",
  "http://127.0.0.1:8888/admin"
];
foreach($urls as $url) {
  $ctx = stream_context_create(["http" => ["timeout" => 10, "ignore_errors" => true]]);
  $resp = @file_get_contents($url, false, $ctx);
  $code = 200;
  if(isset($http_response_header)) {
    preg_match("/HTTP\/[0-9\.]+ ([0-9]+)/", $http_response_header[0], $m);
    $code = $m[1] ?? 200;
  }
  echo $url . " => " . $code . " (" . strlen($resp) . " bytes)\n";
  if($code >= 400) {
    echo "ERROR PREVIEW: " . substr($resp, 0, 500) . "\n\n";
  }
}
