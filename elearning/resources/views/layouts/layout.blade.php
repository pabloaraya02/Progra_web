<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Laravel</title>
 
 {!! Html::style('css/app.css') !!}
 {!! Html::style('css/bootstrap.css') !!}
 {!! Html::style('css/bootstrap.min.css') !!}
 {!! Html::style('css/simple-sidebar.css') !!}
 {!! Html::style('js/jquery-ui-1.12.1.custom/jquery-ui.css') !!}
 
 <!-- Fonts -->
 <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
 
 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>
<body>
 <div id="app">
<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Elearning') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!--<li><a href="{{ route('register') }}">Register</a></li>-->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span> 
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                         @if(Auth::user()->amIAdmin())
                                            <a href="{{ route('managment') }}">Go to Managment</a>
                                        @endif
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

<div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{ route('managment') }}">
                        Gestionar:
                    </a>
                </li>
                <li>
                    <a href="{{route('user.index')}}">Usuarios</a>
                </li>
                <li>
                    <a href="{{route('course.index')}}">Cursos</a>
                </li>
                <li>
                    <a href="{{route('role.index')}}">Roles</a>
                </li>
                <li>
                    <a href="{{route('resource.index')}}">Recursos</a>
                </li>
            </ul>
        </div>
         @yield('content')

   </div>
<!-- /#wrapper -->

 </div>
 <!-- Scripts -->
 {!! Html::script('js/app.js') !!}
 {!! Html::script('js/jquery.js') !!}
 {!! Html::script('js/bootstrap.js') !!}
 {!! Html::script('js/bootstrap.min.js') !!}
 {!! Html::script('js/myJs.js') !!}
 {!! Html::script('js/jquery-ui-1.12.1.custom/jquery-ui.js') !!}
<script type="text/javascript">
        $("#start_date").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#end_date").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#start_date").on('change',function(e){
            e.preventDefault();
            calculateWeeksBetween($(this).val(),$('#end_date').val());    
        });
        $("#end_date").on('change',function(e){
            e.preventDefault();
            calculateWeeksBetween($(this).val(),$('#start_date').val());

        });
        function calculateWeeksBetween(date1, date2) {
            // The number of milliseconds in one week
            /*var ONE_WEEK = 1000 * 60 * 60 * 24 * 7;
            // Convert both dates to milliseconds
            var date1_ms = date1.getTime();
            var date2_ms = date2.getTime();
            // Calculate the difference in milliseconds
            var difference_ms = Math.abs(date1_ms - date2_ms);
            // Convert back to weeks and return hole weeks
            return Math.floor(difference_ms / ONE_WEEK);
               */ 
            var a  = new Date(date1);
            var b = new Date(date2);
            var weeks = Math.round((a-b)/ 604800000);
            $("#duration").val(weeks);
        }   
    </script>
</body>
</html>