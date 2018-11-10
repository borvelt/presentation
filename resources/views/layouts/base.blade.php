<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{env('APP_NAME')}} - @yield('title')</title>

        @yield('styles')

    </head>
<body>

    @yield('body')

    @yield('scripts')

</body>
</html>
