<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Horizontal - Mazer Admin Dashboard</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    
<link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @yield('content')
            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://github.com/egyyudanugraha">Yuda</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
</body>

</html>
