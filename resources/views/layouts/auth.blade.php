<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('black-dash/css/nucleo-icons.css')}}">
    <link rel="stylesheet" href="{{asset('black-dash/css/black-dashboard.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-6 col-12">
            @yield('content')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            @if(session()->has('error'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                            <span data-notify="icon" class="tim-icons icon-bell-55"></span>
                            <span data-notify="message">{{session()->get('error')}}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="{{asset('black-dash/js/black-dashboard.min.js')}}"></script>
</body>
</html>
