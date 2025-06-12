<?php
    function sendSlackNotification($message) {
        $webhook_url = 'https://hooks.slack.com/services/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';
        
        $data = [
            'text' => $message,
            'channel' => '#notify-slack', 
            'username' => 'Sistema PHP',
            'icon_emoji' => ':php:'
        ];
        
        $payload = json_encode($data);
        
        $ch = curl_init($webhook_url);
        
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload)
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10
        ]);
        
        $response = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close($ch);
        
        error_log("Slack Response: ".$response);
        error_log("Slack Error: ".$error);
        error_log("HTTP Code: ".$http_code);
        
        return $response;
    }
?>