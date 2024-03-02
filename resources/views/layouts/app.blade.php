<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('head')

        @yield('standard_css')

        @yield('custom_css')

        @yield('standard_js_head')

        @yield('custom_js_head')
    </head>
    <body>
        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
            @yield('main-content')
        </main>

        @yield('standard_js')

        @yield('custom_js')
    </body>
</html>
