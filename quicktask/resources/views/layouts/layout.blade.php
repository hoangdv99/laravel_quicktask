<!DOCTYPE html>
<html>

<head>
    <title>Laravel - Quicktask</title>
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('projects.index') }}">Quicktask</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    @yield('content')

</body>
<!-- jQuery library -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Latest compiled JavaScript -->
<script src="{{ asset('bower_components/bootstrap-4.1.1/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/projects.js') }}"></script>
<script src="{{ asset('js/tasks.js') }}"></script>
</html>
