<!DOCTYPE html>
<html>
<head>
  <title>Dayim</title>
</head>

<body>

	Dear <b>{{ $code->name }}</b>, <br/>
	<p>
		You are receiving this email to verify its you.
	</p>
	<p>
		Your Verification Code: <b>{{ $code->code }}</b>
	</p>	
	<br/>
	Thank You,
	<br/>
	<i>Dayim</i>

</body>
</html>