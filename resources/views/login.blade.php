<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	  <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<form method="POST" action="">
	{{crsf_field}}
</form>
<body>
<!--Use Defer tag to prevent page from slowing down when HTML is being parsed-->
<script type="text/javascript" src="{{url ('js/login.js') }}" defer></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" defer></script>
<!--JavaScript at end of body for optimized loading-->
 <script type="text/javascript" src="/js/materialize.min.js" defer></script>
</body>
</html>