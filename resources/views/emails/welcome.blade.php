<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Спасибо за подписку</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<style>
		body {
			margin: 0;
			padding: 0;
		}
		h3 {
			text-align: center;
		}
		.text {
			padding: 10px 50px;
		}
		h5 {
			padding-left: 50px;
		}
	</style>
</head>
<body>
<h3>Здравствуйте {{$user->name}}!</h3>
<div class="text">Для подтверждения регистрации пройдите по ссылке <a href="{{route('confirm',$token)}}">{{route('confirm',$token)}}</a></div>

<h5>Спасибо. <br> {{config('project.MAIL_AUTHOR')}} </h5>
</body>
</html>