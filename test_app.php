<?php
$url = "http://127.0.0.1:8000/";
$ctx = stream_context_create(["http" => ["timeout" => 10]]);
$resp = @file_get_contents($url, false, $ctx);
if($resp === false) { echo "FAIL: Cannot connect\n"; }
else { echo "OK: " . strlen($resp) . " bytes received\n"; echo substr($resp, 0, 200) . "\n"; }
