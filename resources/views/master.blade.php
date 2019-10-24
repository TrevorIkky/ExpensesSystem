<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
      <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" ></script>
     
     
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Nunito+Sans&display=swap" rel="stylesheet"> 
     <title>@yield('title')</title>
</head>

<body>
<div id="menus" class="menus">
    <img id="close-nav-bar" width="20" height="20" src="/images/delete.png" />
    <ul>
        <li><a href="{{url('/dashboard')}}">OVERVIEW</a></li>
        <li><a href="{{url('/inventory')}}">INVENTORY</a></li>
        <li><a href="{{url('/add')}}">EXPENSES</a></li>
        <li><a href="{{url('/menu')}}">MENU</a></li>
        <li><a href="{{url('/payments')}}">PAYMENTS</a></li>

    </ul>
</div>
<div id="main-container" class="main-container">
    <div class="toolbar">
        <h4 id="header-text">Toni's Kitchen</h4>
        <div id="open-nav-bar" class="open-nav-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
    @yield('main-content')
</div>

<script type="text/javascript" src="{{url ('js/login.js') }}" defer></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" ></script>
<script type="text/javascript" src="/js/materialize.min.js" defer></script>
<script type="text/javascript" src = "/js/master.js"></script>
<script type="text/javascript" src="/js/dropzone.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js" defer></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>