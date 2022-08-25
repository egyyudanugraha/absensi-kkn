<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi | KKN Suradita</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    
<link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script>
    for (let i = 1; i < 4; i++) {
        const element = array[i];
        $(`#table${i}`).DataTable({
            order: [[0, 'desc']],
        });
    }
</script>
</body>

</html>
