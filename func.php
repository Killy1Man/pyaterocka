<?php
function SendMessage($chat_id,$message){
    $token = "838478065:AAGSKLymcTWfPqAQwi2uYCXR0dX3fjVWSjE"; //token bota
    $query = http_build_query(array(
        'chat_id' => $chat_id,
        'text' => $message,
        'parse_mode' => 'Markdown',
        'reply_markup' => json_encode(['keyboard' => [["💰Баланс", "🗃️Каталог"],["🆘Помощь", "🔑Пополнить"]],'resize_keyboard' => true]),
        'disable_web_page_preview' => true
    ));
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.telegram.org/bot$token/sendMessage?$query",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    file_put_contents('file.txt',json_encode($response));
}
function SendMessageIn($chat_id,$message){
    $token = "838478065:AAGSKLymcTWfPqAQwi2uYCXR0dX3fjVWSjE"; //token bota
    $result = file_get_contents("https://gameacc.ru/walged/bot.php?r=catal"); //zamenit site
    $re = '/^(\d*):\s(.*)\s\|\s.*\s-\s(\d*).*$/m';
    preg_match_all($re, $result, $matches, PREG_SET_ORDER, 0);
    foreach($matches as $res){
      $key[] = [["text"=>"{$res[1]}","callback_data" => "/buy {$res[1]}"]];
    }
    $query = http_build_query(array(
        'chat_id' => $chat_id,
        'text' => $message,
        'parse_mode' => 'Markdown',
        'reply_markup' => json_encode(["inline_keyboard" => $key]),
        'disable_web_page_preview' => true
    ));
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.telegram.org/bot$token/sendMessage?$query",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response = curl_exec($curl);
    curl_close($curl);
}