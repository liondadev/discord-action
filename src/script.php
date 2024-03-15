<?php

// Get properties from our environment that are used when sending the message...
$webhook_url = getenv("WEBHOOK_URL");
if (!$webhook_url) {
    echo "::error:: Webhook URL not provided with WEBHOOK_URL environment variable.";
    return;
}

$message = getenv("WEBHOOK_MESSAGE");
if (!$message) {
    echo "::error:: Webhook message not provided with WEBHOOK_MESSAGE environment variable.";
    return;
}

$body = json_encode([
    "content" => $message,
]);


$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);
