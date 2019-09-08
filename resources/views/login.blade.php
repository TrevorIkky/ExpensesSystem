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

      <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 

      <link rel="stylesheet" type="text/css" href="/css/login.css">


      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" ></script>

     
</head>


<body>
	<!--error handling divs-->
	@if ($error_message = Session::get('error'))
	<div>
		<h3>{{$error_message}}</h3>
	</div>
	@endif

	@if (count($errors) > 0)
	@foreach($errors->all() as $erroritem)
	<div>
		<h4>{{$erroritem}}</h4>
	</div>
	@endforeach
	@endif

   

	<!--
		<form id = "login-form"method="POST" action="{{url('login/serve')}}">
		{{csrf_field()}}
		<input type="text" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="password">
		<input type="submit" name="Login">
	</form>
	-->
	<!---->

<div id="main-container">
        <div id="left-panel">

            <div id="login-info">
                <h4>Welcome back!</h4>
                <p>Please enter your username and password so that we can verify its you. If you don't have an account you can sign up for one.</p>
                <div id="sign-up-btn">
                    <h5>Sign Up</h5>
                </div>
            </div>

            <div id="register-info">
                <h4>Lets go!</h4>
                <p>Signing up for and account is easy just provide the details indicated and hit sign up</p>
                <div id="login-btn">
                    <h5>Login</h5>
                </div>
            </div>

        </div>
        <div id="right-panel">
            <div id="right-panel" class="valign-wrapper">

                <div id="login-form">
                    <form method="POST" action="{{url('login/serve')}}">
                        {{csrf_field()}}
     
                       <i id="icon" class="material-icons prefix">person_pin</i>
                        <input type="text" id="email" name="email" placeholder="Email">
                         <i id="icon" class="material-icons prefix">https</i>
                        <input type="password" id="password" name="password" placeholder="password">

                        <button id="submit-login" class="waves-effect waves-light btn-large" type="submit" name="action">Login
                        </button>
                    </form>
                </div>


                <div id="register-form">
                <form method="POST" action="{{url('login/register')}}">
                        {{csrf_field()}}
                        <i id="icon" class="material-icons prefix">account_circle</i>
                        <input type="text" id="name" name="name" placeholder="name">
                       <i id="icon" class="material-icons prefix">person_pin</i>
                        <input type="text" id="email" name="email" placeholder="Email">
                         <i id="icon" class="material-icons prefix">https</i>
                        <input type="password" id="password" name="password" placeholder="password">

                        <button id="submit-register" class="waves-effect waves-light btn-large" type="submit" name="action">REGISTER
                        </button>
                    </form>
                </div>


            </div>
        </div>

<!--Use Defer tag to prevent page from slowing down when HTML is being parsed-->
<script type="text/javascript" src="{{url ('js/login.js') }}" defer></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" ></script>
<!--JavaScript at end of body for optimized loading-->
 <script type="text/javascript" src="/js/materialize.min.js" defer></script>

 <script type="text/javascript" src = "/js/login.js">
 	
 </script>
</body>
</html>