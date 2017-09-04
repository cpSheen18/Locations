<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--title>{{ config('app.name', 'Laravel') }}</title-->
    <title>Web Login System</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ URL('/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ URL('/biomertic-login/assets/css/ajaxmask.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="{{ URL('/biomertic-login/assets/js/html5shiv.min.js') }}"></script>
	<script src="{{ URL('/biomertic-login/assets/js/respond.min.js') }}"></script>
	<![endif]-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{ URL('/biomertic-login/assets/js/jquery.min.js') }}"></script>
	<script src="{{ URL('/biomertic-login/assets/js/jquery.timer.js') }}"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{ URL('/biomertic-login/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL('/biomertic-login/assets/js/ajaxmask.js') }}"></script>

	<script src="{{ URL('/biomertic-login/assets/js/custom.js') }}"></script>
	<link rel="stylesheet" href="{{ URL('/css/bootstrap-treeview.min.css') }}" />
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
		var ajax_url = "{{ URL('/') }}";
		var biometric_url = "{{ URL('/biomertic-login') }}";
    </script>
	<script src="{{ asset('js/login.js') }}"></script>
	<style>
		.dispnone{display:none !important}
		.pull-right.forgot-password {margin: 1% 27% 0 0;}
	</style>
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
					<a href="{{ url('/') }}">
					<img class="business-one-logo" src="{{ URL('img/logo.png') }}" />
					</a>
                    <!--a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a-->
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
                            <!--li><a href="{{ route('login') }}">Login</a></li-->
                            <li><a href="{{ URL('/username') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
							<li><a href="{{ URL('active_users') }}">Active Users</a></li>
							<li><a href="{{ URL('list_template') }}">Manage Templates</a></li>
							<li><a href="{{ URL('list_menu') }}">Manage Menus</a></li>
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Manage Masters <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ URL('list_corporation') }}">Corporations</a></li>
                                    <li><a href="{{ URL('list_module') }}">Modules</a></li>
                                    <li><a href="{{ URL('list_feature') }}">Features</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span>
                                    {{ Auth::user()->Full_Name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('settings.index') }}"><span class="glyphicon glyphicon-wrench">   </span>Settings</a></li>
                                    <!--li><a href="{{ URL('sys_settings') }}"><span class="glyphicon glyphicon-wrench"></span>Settings</a></li-->
                                    <li><a href="{{ URL('logout') }}"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                                    
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
          <div class="row" style="margin-top: 15px;">
            @if(\Session::get('error'))
            <div class="alert alert-danger col-md-8 col-md-offset-2 {{ \Session::get('error') == "You don't have permission" ? "no-close" : ""}}" style="border-radius: 3px;">
                <span class="fa fa-close"></span> <em>{{ \Session::get('error') }}</em>
            </div>
            @elseif(\Session::get('success'))
                <div class="alert alert-success col-md-8 col-md-offset-2" style="border-radius: 3px;">
                    <span class="fa fa-close"></span> <em>{{ \Session::get('success') }}</em>
                </div>
            @endif
        </div>
        <div class="container-fluid">
          <div class="row">
            <div id="togle-sidebar-sec" class="active">
              <div id="sidebar-togle-sidebar-sec">
                <ul id="sidebar_menu" class="sidebar-nav">
                    <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
                </ul>
                <div class="sidebar-nav" id="sidebar">     
                    <div id="treeview_json"></div>
                </div>
              </div>
              <div id="page-content-togle-sidebar-sec">
                @yield('content')
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    
    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	<script src="{{ URL('/js/bootstrap-treeview.js') }}"></script>
	<script>
		if($("#treeview_json").length){
			$.ajax({
				url: ajax_url+'/list_menu',
				data: {_token:$("meta[name='csrf-token']").attr('content')},
				type: 'post',
				cache: false,
				success: function(response){
					var jsoncode = JSON.parse(response);   
					$('#treeview_json').treeview({data: jsoncode});
                  if(document.location.hash){ 
                         var document_id=document.location.hash;
                          var document_id=document_id.replace('#','');
                          document_id=parseInt(document_id);
                           $('#treeview_json').treeview('revealNode', [ document_id, { silent: true } ]);
                          $('#treeview_json').treeview('selectNode', [ document_id, { silent: true } ]);
                      }
				}
			});
		}
        $(document).on('click','.node-treeview_json',function(event) {
			var obj=$(this).find('a');
			var href=obj.attr('href');
			var val=$(this).attr('data-nodeid');
			var path = window.location.href;
			path = path.split('#')[0];
			history.pushState(null, null, path + '#' + val);
			obj.attr('href',href+'#'+val);
        });
	</script>
</body>
</html>
