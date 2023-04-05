<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-frontend.head></x-frontend.head>

<body class="animsition">

    <div id="wrapper-container">

        <!-- Header -->
        <x-frontend.header/>
        <!-- end Header -->

        <!-- Main content -->
        {{ $slot }}
        <!-- end Main content -->

        <div class="py-5"></div>

        <!-- Footer -->
        <x-frontend.footer></x-frontend.footer>
        <!-- end Footer -->
    </div>

    <x-frontend.back-to-top></x-frontend.back-to-top>

    <x-frontend.footer.js></x-frontend.footer.js>

</body>

</html>