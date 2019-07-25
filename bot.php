<?php
include("bd.php");
function SendMessage($chat_id,$message){
    $token = "924603027:AAHvT4muOhQmShu6194OQDw8Zm80RO8hixU"; //token bota
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
mysql_query("SET NAMES utf8");
$req = $_GET['r'];
$chatid = $_GET['c'];
$username = $_GET['u'];
$param = $_GET['p'];
$link = $_GET['link'];
$price = $_GET['price'];
$dan = $_GET['dan'];
if($req == 'reg'){
    $res = mysql_fetch_array(mysql_query("SELECT * FROM `tg` WHERE `chatid` = '$chatid'"));
    if($res['chatid']){
        echo "*Пользователь с таким chat_id уже зарегестрирован*";
    }else{
        mysql_query("INSERT INTO `tg`(`id`, `chatid`, `username`, `balance`, `admin`) VALUES (NULL,'$chatid','$username',0,0)");
        echo "*Аккаунт успешно зарегестрирован!*";
    }
}elseif($req == 'qiwi'){
    $result = mysql_fetch_array(mysql_query("SELECT `qiwi` FROM `settings` WHERE 1"));
    echo $result['qiwi'];
}elseif($req == 'bal'){
    $result = mysql_fetch_array(mysql_query("SELECT * FROM `tg` WHERE `chatid` = '$chatid'"));
    echo $result['balance'];
}elseif($req == 'catal'){
    $result = mysql_query("SELECT * FROM `catalog` WHERE 1");
    while($res = mysql_fetch_array($result)){
        echo "{$res['id']}: {$res['name']} | [АККАУНТ]({$res['link']}) - {$res['price']}р.\n";
    }
}elseif($req == 'admin'){
    $result = mysql_fetch_array(mysql_query("SELECT * FROM `tg` WHERE `chatid` = '$chatid'"));
    if($result['admin'] == '1'){
        echo 1;
    }else{
        die;
    }
}elseif($req == 'chaqi'){
    $result = mysql_query("UPDATE `settings` SET `qiwi` = '$param' WHERE 1");
    if($result){
        echo "*Киви кошелёк для оплат успешно обновлён!*\n";
    }else{
        echo "*что-то пошло не так*";
    }
}elseif($req == 'chato'){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://edge.qiwi.com/payment-notifier/v1/hooks?hookType=1&param=https://gameacc.ru/walged/qiwi.php&txnType=0", //site menyant
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_HTTPHEADER => array(
            "accept: */*",
            "authorization: Bearer $param"
    ),
    ));
    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    if(isset($response->hookId)){
        $result = mysql_query("UPDATE `settings` SET `token` = '$param' WHERE 1");
        echo "*Токен киви успешно обновлён!*\nhookid для отмены вебхука: {$response->hookId}";
    }else{
        echo "*что-то пошло не так*\n {$response->description}";
    }
}elseif($req == 'chang'){
    $result = mysql_query("UPDATE `tg` SET `balance` = '$param' WHERE `chatid` = '$chatid'");
    if($result){
        echo "*Баланс успешно обновлён!*";
    }else{
        echo "какая-то проблема";
    }
}elseif($req == 'add'){
    $result = mysql_query("INSERT INTO `catalog` (`id`, `stuff`, `price`, `name`, `link`) VALUES (NULL, '{$dan}', '{$price}', '{$param}', '$link');");
    if($result){
        echo "*Товар успешно добавлен!*";
    }else{
        echo "Something wrong";
    }
}elseif($req == 'buy'){
    $result = mysql_query("UPDATE `tg` SET `balance` = `balance` - '{$price}' WHERE `chatid` = '{$chatid}'");
    if($result){
        $data = mysql_fetch_array(mysql_query("SELECT * FROM `catalog` WHERE `id` = '{$param}'"));
        echo "*Успешная покупка!*\n_Данные:_\n`{$data['stuff']}`";
    }else{
        echo 'произошла ошибка';
    }
}elseif($req == 'price'){
    $result = mysql_fetch_array(mysql_query("SELECT * FROM `catalog` WHERE `id` = '{$param}'"));
    echo $result['price'];
}elseif($req == 'sends'){
    $max = mysql_fetch_array(mysql_query("SELECT MAX(id) FROM `tg` WHERE 1"));
    for($i=1;;$i++){
        if($i > $max['MAX(id)']){
            break;
        }
        $chatid = mysql_fetch_array(mysql_query("SELECT * FROM `tg` WHERE `id` = '$i'"));$chatid = $chatid['chatid'];
        SendMessage($chatid,$param);
    }
    SendMessage($res['chatid'],$param);
    echo "команда успешно выполнена";
}