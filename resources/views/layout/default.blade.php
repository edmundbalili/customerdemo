<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Customer Demo</title>
</head>
<body>
    <div id="app" class="container">
        <div class="w-50 mx-auto">
            <div>
                <nav class="navbar navbar-expand-md">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('list') }}">Customers</a>
                        </li>
                    </ul>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>
</body>
</html>
