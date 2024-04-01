<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('assets/js/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/js/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/js/vendor/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
        @vite(['resources/sass/admin/app.scss', 'resources/js/admin/app.js'])

        <script>
          var adminUrl = "{{ url('admin') }}";
        </script>
    </head>
   
    <body>
      <!-- apply javascript before page content be loaded -->
      <script>
      'use strict';
        var defaultConfig = {
          fixedLeftSidebar: true,
          fixedHeader: false,
          fixedFooter: false,
          isShrinked: false,
          themeColor: 'app-theme-facebook',
          themeMode: 'default-mode'
        };
        var globalConfigs = JSON.parse(localStorage.getItem('ABCADMIN_CONFIG')) || defaultConfig;
        var appThemeMode = globalConfigs.themeMode;
        var isShrinked = globalConfigs.isShrinked;
        var body = document.getElementsByTagName("body")[0];
        body.setAttribute("data-theme-mode", appThemeMode);
        body.setAttribute("data-theme-sidebar-shrinked", isShrinked)
      </script>
          <!--**********************************
              BEGIN left sidebar
          ***********************************-->
          @include('layouts.admin.partials.left-sidebar')
          <!--**********************************
              END left-sidebar
          ***********************************-->

          <div class="page-container">
            @include('layouts.admin.partials.topbar')
            <!--**********************************
              BEGIN page-content
            ***********************************-->
            <main class="page-content">
                {{ $slot }}
            </main>
            <!--**********************************
              END page-content
            ***********************************-->

            <!--**********************************
              BEGIN footer
            ***********************************-->
            @include('layouts.admin.partials.footer')
            <!--**********************************
              END footer
            ***********************************-->
          </div>
          <!-- END page-content -->
        </div>
      <!--**********************************
        END main-wrapper
      ***********************************-->

      <!--**********************************
        BEGIN right sidebar
      ***********************************-->
      @include('layouts.admin.partials.right-sidebar')
      <!--**********************************
        END right sidebar
      ***********************************-->
      <!--**********************************
          Scripts
      ***********************************-->

      @include('layouts.admin.partials.footer-scripts')
      @yield('inline-scripts')
    </body>
</html>
