<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alia | Places to stay for missionaries</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="icon" href="/assets/img/favicon.png">
</head>
<body @home class="home" @endhome>
    <header>
        <div class="container">
            <a href="/"><img class="logo" src="/assets/img/alia.png" alt="Alia"></a>
            <nav class="pull-right">
                <a href="/"><i class="fa fa-home"></i> Home</a>
                @if (Auth::check())
                    <a href="/account"><i class="fa fa-user-circle-o"></i> Account</a>
                @else
                    <a href="/login"><i class="fa fa-sign-in"></i> Login</a>
                @endif
            </nav>
        </div>
    </header>
    <div class="content" id="app">

        @yield('content')

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.min.js"></script>

    @stack('scripts')

</body>
</html>
