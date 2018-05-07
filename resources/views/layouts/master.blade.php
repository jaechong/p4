<!doctype html>
<html>
<head>
    <title>@yield('title', 'My Restaurant')</title>
    <meta charset='utf-8'>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link href='/css/orders.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>
<body>

<header>
    <a href='/'><img src='/images/my_restaurant.png' id='logo' alt='My Restaurant image'></a>
    @include('modules.nav')
</heade>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
    <a href='http://github.com/jaechong/p4'><i class='fa fa-github'></i> View on Github</a>
</footer>

</body>
</html>