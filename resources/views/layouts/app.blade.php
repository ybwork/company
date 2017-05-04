<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Company</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
        <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">

            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('employee_home') }}">Employees</a></li>
                <li><a href="{{ route('department_home') }}">Departments</a></li>
              </ul>
            </div>

          </div>
        </nav>

        @yield('content')
        
        <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('/plugins/select2/dist/js/select2.min.js') }}"></script>
        <script type="text/javascript">
          $('select').select2();
        </script>
        <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
