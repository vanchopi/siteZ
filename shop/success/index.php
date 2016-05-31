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
		$id = (int)$_REQUEST["InvId"];		
		

		$connection = mysql_connect("localhost","work2up_rt","f71efc83klz");
		$db = mysql_select_db("work2up_rt");
		mysql_set_charset("utf8");
		if(!$connection || !$db) {
			mysql_error();
		}
		else {
		  	$result = mysql_query(" SELECT * FROM jos_booking  where id = $id" );  
			while($row=mysql_fetch_array($result))
			{
			$st = 'id='.$row['id']."\n".'Имя: '.$row['name']."\n".'Телефон: '.$row['phone']."\n".'Зал: '.$row['hall']."\n".'Дата: '.$row['data']."\n".'Колличество: '.$row['npers']."\n".'Комментарий: '.$row['comment']."\n".'Сумма: '.$row['sum'].'';	
			$sended = $row['mail'];	
			//echo "<p>"+$sended+"</p>";	

			}
	
		mysql_close();
		}
			$address = 'adm.restorantamada@yandex.ru';
			$address2 = 'online@restoran-tamada.ru';
			$sub = "онлайн бронирование Ресторан Тамада";
			$mes = $st;
			$source="TamadaBooking";
			//echo "<p>"+$sended+"</p>";
			if ($sended == 0)
			{
				$verify = mail ($address, $sub, $mes, "Content-type:text/plain; charset = utf8\r\nFrom:$source");
				$verify1 = mail ($address2, $sub, $mes, "Content-type:text/plain; charset = utf8\r\nFrom:$source");
				$connection = mysql_connect("localhost","work2up_rt","f71efc83klz");
				$db = mysql_select_db("work2up_rt");
				mysql_set_charset("utf8");
				if(!$connection || !$db) 
					{
						mysql_error();
					}
					else {			  						
						$query = mysql_query(" UPDATE jos_booking SET mail='1' where id = $id");				
						mysql_close();
					}		
			}
			else
			{
				
			}			
	
		   ?>

		<div class="mimi_wrap">
			<div class="up_text">
				<span>Оплата успешно произведена !</span>						
			</div>

			<br/><br/>

			
			<form action='http://restoran-tamada.ru/' method="GET">
			<!--<form action='http://test.robokassa.ru/Index.aspx' method="GET">-->	
			      <!--<input type="hidden" name="MrchLogin" value="<?php echo $mrh_login;?>">
			      <input type="hidden" name="OutSum" value="<?php echo $out_summ;?>">
			      <input type="hidden" name="InvId" value="<?php echo $inv_id;?>">
			      <input type="hidden" name="Desc" value="<?php echo $inv_desc;?>">
			      <input type="hidden" name="SignatureValue" value="<?php echo $crc;?>">
			      <input type="hidden" name="Shp_item" value="<?php echo $shp_item;?>">
			      <input type="hidden" name="IncCurrLabel" value="<?php echo $in_curr;?>">
			      <input type="hidden" name="Culture" value="<?php echo $culture; ?>">
			      <input type="hidden" name="IStest" value="<?php echo $IsTest; ?>">-->
			      <input class="bt_submit" id="myButton" type="submit" value='Перейти на сайт' style="display:none;">
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