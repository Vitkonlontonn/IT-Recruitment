<!doctype html>
<html lang="en">

</html>
<head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    @stack('css')
    <link href="{{asset ('css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{asset('css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"
          disabled="disabled">

</head>
<body class=""
      data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:true, &quot;showRightSidebarOnStart&quot;: true}"
      data-leftbar-theme="dark">
<div class="wrapper mm-active">
    @include('layout.sidebar')
    <div class="content-page">
        <div class="content">
            @include('layout.topbar')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('layout.footer')
    </div>
</div>
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
@stack('js')
</body>
</html>
