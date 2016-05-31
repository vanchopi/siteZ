<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>



<div class="first_wrap ht_space">

		
		<?php
		if (isset($_POST['robokassa'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$hall = $_POST['hall'];
		$data = $_POST['data'];
		$npersons = $_POST['npersons'];
		$comment = $_POST['comment'];
		$sum = $_POST['mode_sum'];
		}

		$connection = mysql_connect("localhost","work2up_rt","f71efc83klz");
		$db = mysql_select_db("work2up_rt");
		mysql_set_charset("utf8");
		if(!$connection || !$db) {
			mysql_error();
		}
		else {
		  	$result = mysql_query(" SELECT max(id) FROM jos_booking " );  
			$row = mysql_fetch_assoc($result);
		  	$id = implode('',$row) + 1; 	
		   	//echo 'Последний добавленный id = '.$id;



		$query = mysql_query(" 

		INSERT INTO jos_booking(name,phone,hall,data,npers,comment,sum) VALUES ('$name','$phone','$hall','$data','$npersons','$comment','$sum')



		");
		mysql_close();
		}
			$address = 'adm.restorantamada@yandex.ru';
			$address2 = 'online@restoran-tamada.ru';
			$sub = "онлайн бронирование Ресторан Тамада";
			$mes = "Имя: $name - бронирует стол \nтелефон: $phone \nдата и время: $data \nid: $id \nсумма: $sum \nзал и стол: $hall\nколличество человек: $npersons\nСодержание письма: $comment";
			$source="TamadaBooking";

			//$verify = mail ($address, $sub, $mes, "Content-type:text/plain; charset = utf8\r\nFrom:$source");
			//$verify1 = mail ($address2, $sub, $mes, "Content-type:text/plain; charset = utf8\r\nFrom:$source");		
		
			/*
				Общие
				Пароль1: tQ22J2EWc7KwMLeji6Wm
				Пароль2: yXfF4dH8KNDGtq3DI4C6

				Параметры проведения тестовых платежей
				Пароль1: L0b5DkdwW40QnML8gFjb
				Пароль2: N9p9FoKx1eF8eJJdTU3W
			*/

			$mrh_login = "restorantamada";
			$mrh_pass1 = "tQ22J2EWc7KwMLeji6Wm";
			$mrh_pass2 = "yXfF4dH8KNDGtq3DI4C6";
			// номер заказа
			// number of order
			$inv_id = $id;

			// описание заказа
			// order description
			$inv_desc = "Ресторан Тамада онлайн бронирование и предоплата";

			// сумма заказа
			// sum of order
			$out_summ = $sum;

			// тип товара
			// code of goods
			$shp_item = "1";

			//имя
			$shp_name = urlencode($name);
			//телефон
			$shp_phone = $phone;
			//зал
			$shp_hall =	urlencode($hall);	
			//время
			$shp_time = $data;
			//колличество
			$shp_quant = urlencode($npersons);
			//коммент
			$shp_comment = urlencode($comment);
			// предлагаемая валюта платежа
			// default payment e-currency
			$in_curr = "";

			// язык
			// language
			$culture = "ru";

			// формирование подписи
			// generate signature
			$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

			//$IsTest = 1;

			// форма оплаты товара
			// payment form
			/*print "<html>".
			      "<form action='https://merchant.roboxchange.com/Index.aspx' method=GET>".
			      "<input type=hidden name=MrchLogin value=$mrh_login>".
			      "<input type=hidden name=OutSum value=$out_summ>".
			      "<input type=hidden name=InvId value=$inv_id>".
			      "<input type=hidden name=Desc value='$inv_desc'>".
			      "<input type=hidden name=SignatureValue value=$crc>".
			      "<input type=hidden name=Shp_item value='$shp_item'>".
			      "<input type=hidden name=IncCurrLabel value=$in_curr>".
			      "<input type=hidden name=Culture value=$culture>".
			      "<input type=submit value='Оплатить'>".
			      "</form></html>";	*/
	
		   ?>

		<div class="mimi_wrap">
			<div class="up_text">
				<span>Данные успешно сохранены !</span>						
			</div>

			<br/><br/>

			<!--<form class="rb_go" method="POST" action="http://test.robokassa.ru/Index.aspx">
				
				<div>
			    		<input id="summa" name="mode_sum" type="hidden" value="<?php echo $sum;?>"></input>
			    </div>

			    <div>
			    		<input id="num" name="mode_num" type="hidden" value="<?php echo $id;?>"></input>
			    </div>

			    <div>
			    		<input class="bt_submit" type="submit" value="Продолжить оплату на сайте Робокасса" />
			    </div>

			</form>-->
			<form action='https://merchant.roboxchange.com/Index.aspx' method="GET">
			<!--<form action='http://test.robokassa.ru/Index.aspx' method="GET">-->	
			      <input type="hidden" name="MrchLogin" value="<?php echo $mrh_login;?>">
			      <input type="hidden" name="OutSum" value="<?php echo $out_summ;?>">
			      <input type="hidden" name="InvId" value="<?php echo $inv_id;?>">
			      <input type="hidden" name="Desc" value="<?php echo $inv_desc;?>">
			      <input type="hidden" name="SignatureValue" value="<?php echo $crc;?>">
			      <input type="hidden" name="Shp_item" value="<?php echo $shp_item;?>">
			      <input type="hidden" name="IncCurrLabel" value="<?php echo $in_curr;?>">
			      <input type="hidden" name="Culture" value="<?php echo $culture; ?>">
			      <input type="hidden" name="IStest" value="<?php echo $IsTest; ?>">
			      <input type="hidden" name="nName" value="<?php echo $shp_name; ?>">
			      <input type="hidden" name="nPhone" value="<?php echo $shp_phone; ?>">
			      <input type="hidden" name="nHall" value="<?php echo $shp_hall; ?>">
			      <input type="hidden" name="nTime" value="<?php echo $shp_time; ?>">
			      <input type="hidden" name="nQuant" value="<?php echo $shp_quant; ?>">
			      <input type="hidden" name="nComment" value="<?php echo $shp_comment; ?>">

			      <input class="bt_submit" id="myButton" type="submit" value='Продолжить оплату на сайте Робокасса' style="display:none;">
			</form>

		</div>

		

</div>

<script type="text/javascript">
function func(){
	if($('#myButton').click()!==false) {
		
	    $('#myButton').submit();
	}
}

setTimeout(func, 1500);
</script>

</body>

</html>