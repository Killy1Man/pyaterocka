<?php
include("func.php");
if (!isset($_REQUEST)){
}
$data = json_decode(file_get_contents('php://input'));
$cbid = $data->callback_query->from->id;
$cbdata = $data->callback_query->data;
$message = strtolower($data->message->text);
$chatid = $data->message->from->id;
$first_name = $data->message->from->first_name;
$username = $data->message->from->username;
$re = '@(/humber)\s(.*\+\d{9,11})@m';
$req = '@(/token)\s(.*.{32})@m';
$red = '@(/redbalance)\s(\d{9})\s(\d*)@m';
$rea = '~(\/addtovar)\s(.*)\s(.*)\s(\d*)\s(.*)~m';
$real = '/(\/buy)\s(\d*)/m';
$react = '/(\/sends)\s(.*)/ms';
preg_match_all($re, $message, $matches, PREG_SET_ORDER, 0);
preg_match_all($req, $message, $match, PREG_SET_ORDER, 0);
preg_match_all($red, $message, $matche, PREG_SET_ORDER, 0);
preg_match_all($rea, $data->message->text, $matoch, PREG_SET_ORDER, 0);
preg_match_all($real, $cbdata, $matchast, PREG_SET_ORDER, 0);
preg_match_all($react, $data->message->text, $matchesa, PREG_SET_ORDER, 0);
if(isset($cbid)){
	if($cbdata){
		if($matchast[0][1]){
			$checkbal = file_get_contents("https://gameacc.ru/walged/bot.php?r=bal&c=$cbid");
			$price = file_get_contents("https://gameacc.ru/walged/bot.php?r=price&p={$matchast[0][2]}");
			if($checkbal >= $price){
				SendMessage($cbid,"*Осуществляю покупку...*");
				$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=buy&price=$price&c=$cbid&p={$matchast[0][2]}");
				SendMessage($cbid,$result);
			}else{
				SendMessage($cbid,"*У вас не хватает денег для покупки*");
			}
		}else{
			SendMessage($cbid,"Не удалось получить параметры");
		}
	}
}else{
	if($matches[0][1]){
		$admin = file_get_contents("https://gameacc.ru/walged/bot.php?r=admin&c=$chatid");
		if($admin){
			$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=chaqi&p=".urlencode($matches[0][2]));
			SendMessage($chatid,$result);
		}else{
			SendMessage($chatid,"*Вы не администратор!*");
		}
	}elseif($match[0][1]){
		$admin = file_get_contents("https://gameacc.ru/walged/bot.php?r=admin&c=$chatid");
		if($admin){
			$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=chato&p=".urlencode($match[0][2]));
			SendMessage($chatid,$result);
		}else{
			SendMessage($chatid,"*Вы не администратор!*");
		}
	}elseif($matche[0][1]){
		$admin = file_get_contents("https://gameacc.ru/walged/bot.php?r=admin&c=$chatid");
		if($admin){
			$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=chang&p={$matche[0][3]}&c={$matche[0][2]}");
			SendMessage($chatid,$result);
		}else{
			SendMessage($chatid,"*Вы не администратор!*");
		}
	}elseif($matoch[0][1]){
		$admin = file_get_contents("https://gameacc.ru/walged/bot.php?r=admin&c=$chatid");
		if($admin){
			$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=add&p=".urlencode($matoch[0][2])."&link=".urlencode($matoch[0][3])."&price={$matoch[0][4]}&dan={$matoch[0][5]}");
			SendMessage($chatid,$result);
		}else{
			SendMessage($chatid,"*Вы не администратор!*");
		}
	}elseif($matchesa[0][1]){
		$admin = file_get_contents("https://gameacc.ru/walged/bot.php?r=admin&c=$chatid");
		if($admin){
			$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=sends&p=".urlencode($matchesa[0][2]));
			SendMessage($chatid,$result);
		}else{
			SendMessage($chatid,"*Вы не администратор!*");
		}
	}
	else{
		switch($message){
			case "/start":
				$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=reg&c=$chatid&u=".urlencode($username));
				SendMessage($chatid,"*Регистрирую аккаунт...*");
				SendMessage($chatid,$result);break;
			case "💰Баланс":
			case "/balance":
				$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=bal&c=$chatid");
				SendMessage($chatid,"*На вашем балансе {$result}р.*");break;
			case "🆘Помощь":
			case "/help":
				SendMessage($chatid,"*Если у вас возникли проблемы, напишите нам с сообщением 'Стим бот' с вами сразу свяжется оператор:*\n https://vk.com/freestorefire\n\n*Как пополнить баланс?*\n- Чтобы пополнить баланс вам нужно войти в свой киви кошелек, перед этим скопировав номер и примечание, перевести любую сумму указав вышенаписанные данные и как только поступят средства бот вас оповестит о пополнении баланса.\n\n*На аккаунте отлега меньше 10 дней:*\n- Если вы заметили, что в каталоге у аккаунта сбилась отлега, то желательно не покупать такой аккаунт и пропустить его.\n\n*Откуда у вас эти аккаунты.*\n- Если вы переходили в группу вк, то возможно видели, что в прошлом году мы скупали аккаунты, а также мы находим поставщиков на таких форумах как lolzteam.org.\n\n*Почему цена такая дешевая:*\n- Мы не уверены, что она дешевая, мы сказали бы вполне адекватная, так как покупателя очень сложно найти, если цены просто заоблачные. Все тарифы исходятся от того, за сколько был приобретен аккаунт, т.е. вы даже переплачиваете 10-20%. Иначе бы мы никак не зарабатывали с этого.\n\n*Я купил аккаунт, а он не рабочий:*\n- Если такое действительно произошло, а такое очень редко, то отпишите в нашу группу Вконтакте, заранее сообщив ваш Telegram аккаунт.\n\n*Я пополнил баланс, а уведомление не пришло:*\n- Бывает, что пользователь спешит или еще что-то и просто забывает или не правильно указывает примечание, для решения таких проблем, отпишите нам в группу, мы вам поможем.\n\n*Какие гарантия что меня не обманут:*\n- В нашей группе Вконтакте существуют еще прошлогодние отзывы со времен скупки, можете перейти почитать. Если сомневаете, не покупайте, мы никого не принуждаем к покупке.\n\n*Я хочу продать свой аккаунт:*\n- К сожалению база аккаунтов у нас есть вполне большая, пока что нам хватает, мы даже ленимся выставить все аккаунты на продажу, но если нам все же понадобяться аккаунты, мы оповестим вас в данном Telegram боте.");break;
			case "🗃️Каталог":
			case "/catalog":
				$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=catal");
				SendMessage($chatid,"*Прогружаю каталог...*");
				SendMessageIn($chatid,"*Доступые для покупки товары:*\n{$result}\nДля покупки нажми на кнопку желаемого аккаунта");break;
			case "🔑Пополнить":
			case "/pay":
				$result = file_get_contents("https://gameacc.ru/walged/bot.php?r=qiwi");
				SendMessage($chatid,"*Для пополнения переведите любую сумму на данный номер:*\n\n `{$result}` (кликабельно)\n\n".
									"В примечание укажите данные цифры: `{$chatid}` (кликабельно)\n".
									"*после пополнения ожидайте уведомление о начислении*");break;
			case 0:
				SendMessage($chatid,"К сожалению не знаю такой команды :(");break;
		}
	}
}
