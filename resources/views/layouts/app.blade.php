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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
        @include('partials/_nav-bar')
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        @include('partials/_header')
        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar -->
        <div class="content">
            <div class="row">
                @if(true)
                    @include('partials._bread-crumb')
                @endif
                <div class="col-12">
                    @include('partials._alerts')
                    @yield('content')
                </div>
            </div>
        </div>
        @include('partials._footer')
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
<script src="{{asset('black-dash/js/black-dashboard.min.js')}}"></script>
@yield('custom_scripts')
</body>
</html>
