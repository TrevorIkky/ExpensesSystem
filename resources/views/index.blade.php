<!DOCTYPE html>
<html>
<head>
	<title>DashBoard</title>
</head>
<body>
@if ($user_details = Auth::user())
<H1>Welcome to the dashboard {{$user_details->name}}</H1>
@endif
</body>
</html>