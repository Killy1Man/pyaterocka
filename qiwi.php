<?php
include("bd.php");
include("func.php");
if (!isset($_REQUEST)){
}
$data = json_decode(file_get_contents('php://input'));

$type = $data->payment->type;
$status = $data->payment->status;
$account = $data->payment->account;
$comment = $data->payment->comment;
$sum = $data->payment->sum->amount;
if($type == "IN"){
    if($status == "SUCCESS"){
        mysql_query("UPDATE `tg` SET `balance` = `balance` + '$sum' WHERE `chatid` = '$comment';");
        SendMessage($comment,"*Успешное пополнение!*\nАккаунт успешно пополнен с киви: `$account`\nНа сумму: `$sum`р.");
    }
}