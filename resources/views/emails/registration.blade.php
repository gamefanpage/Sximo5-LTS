<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello {{ $firstname }} , </h2>
		<p> Thank your for joining with our site </p>
		<p> Bellow is your account Info </p>
		<p>
			Email : {{ $email }} <br />
			Password : {{ $password }}<br />
		</p>
		<p> Please follow link activation  <a href="{{ URL::to('user/activation?code='.$code) }}"> Active my account now</a></p>
		<p> If the link now working , copy and paste link bellow </p>
		<p> {{ URL::to('user/activation?code='.$code) }} </p> 
		<br /><br /><p> Thank You </p><br /><br />
		
		{{ CNF_APPNAME }} 
	</body>
</html>