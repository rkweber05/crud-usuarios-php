<?php 
    function sendSlackNotification($message) {
        $webhook_url = 'https://hooks.slack.com/services/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'; 

        $payload = json_encode(['text' => $message]);

        $ch = curl_init($webhook_url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $error = curl_error($ch);

        if ($error) {
            error_log("Erro ao enviar para o Slack" . $error);
        }

        curl_close($ch);

        return $response;
    }
?>