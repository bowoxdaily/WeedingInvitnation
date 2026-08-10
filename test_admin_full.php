<?php
$loginUrl = "http://127.0.0.1:8888/admin/login";
$dashUrl = "http://127.0.0.1:8888/admin/dashboard";

// Step 1: Get CSRF token from login page
$loginPage = file_get_contents($loginUrl);
preg_match('/name="_token" value="([^"]+)"/', $loginPage, $matches);
$token = $matches[1] ?? '';

echo "CSRF Token: " . substr($token, 0, 20) . "...\n";

// Step 2: Login
$postData = http_build_query([
    '_token' => $token,
    'email' => 'admin@wedding.com',
    'password' => 'wedding2026'
]);

$opts = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                     "Content-Length: " . strlen($postData) . "\r\n",
        'content' => $postData,
        'follow_location' => 0,
        'ignore_errors' => true
    ]
];

$ctx = stream_context_create($opts);
$result = file_get_contents($loginUrl, false, $ctx);

if(isset($http_response_header)) {
    foreach($http_response_header as $header) {
        if(stripos($header, 'Location:') !== false) {
            echo "Login Response: $header\n";
        }
        if(stripos($header, 'HTTP/') !== false) {
            echo "Status: $header\n";
        }
    }
}

echo "\nLogin test completed.\n";
