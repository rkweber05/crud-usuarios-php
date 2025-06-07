<?php 
    function sendSlackNotification($message) {
        $webhook_url = 'https://hooks.slack.com/services/WEEBHOOKAQUI'; // ver como que faz

        $payload = json_encode(['text' => $message]);

        $ch = curl_init($webhook_url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_exec($ch);
        curl_close($ch);
    }
?>