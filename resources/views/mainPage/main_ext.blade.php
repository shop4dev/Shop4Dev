<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop4Dev</title>
    <link href='/main/parallax/styles/styles.css' rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/main/css/default.css" />
    <link rel="stylesheet" type="text/css" href="/main/css/multilevelmenu.css" />
    <link rel="stylesheet" type="text/css" href="/main/css/component.css" />
    <link rel="stylesheet" type="text/css" href="/main/css/animations.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/main/css/navigation_bar.css">
</head>
<body style="background-color: #2f506a">

@yield('navbar')

<div id="pt-main" class="pt-perspective">
    <div class="pt-page pt-page-1">

        @yield('ParalaxPicture')

        @yield('logo')

        @yield('information_button')

    </div>
        {{--@yield('navigation_bar')--}}
    <div class="pt-page pt-page-2">
        @yield('second')
    </div>

    <div class="pt-page pt-page-3">
        @yield('third')
    </div>

    <div class="pt-page pt-page-4">
        @yield('fourth')
    </div>

</div>

@yield('script')

</body>
</html>
