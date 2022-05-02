<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
	<p>Dear valued customer, </p>
	<br>
	<p>Thank you for being patient with us.</p>
	<p>We have reviewed your issue and replied in the {{ config('app.name', 'Laravel') }}.</p>
	<p>Please follow below link to the issue response.</p>
	<br>
	<p>
		<a href="{{ route('tickets.track', 'reference='.$details['reference']) }}"> {{ 'Reference: '.$details['reference'] }}</a>
	</p>
	<br>
	<p>Thank you.</p>
	<p>{{ config('app.name', 'Laravel') }} team.</p>
</body>
</html>