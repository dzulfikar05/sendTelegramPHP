<?php
$telegram_id = $_POST['chatid'];
$message_text = $_POST['pesan'];
$secret_token = '7190147038:AAHBfcvuFd1Cw0hsSw27ZMR5aJOUCQY7aEE';
sendMessage($telegram_id, $message_text, $secret_token);

function sendMessage($telegram_id, $message_text, $secret_token) {
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
       echo 'Pesan gagal terkirim, error :' . $err;
    }else{
        echo 'Pesan terkirim';
    }
}
?>

<!-- get api response -->
<!-- https://api.telegram.org/bot7190147038:AAHBfcvuFd1Cw0hsSw27ZMR5aJOUCQY7aEE/getUpdates -->