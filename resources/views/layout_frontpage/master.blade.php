<html>
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>IT - Recuiter</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet">
</head>
<body class="ecommerce-page">
@include('layout_frontpage.navbar')
@include('layout_frontpage.header')

<div class="main main-raised">
    <!-- section -->
    <div class="section">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>

@include('layout_frontpage.footer')

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
<script src="{{ asset('js/nouislider.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->


<script type="text/javascript">
    $(document).ready(function () {
        const slider2 = document.getElementById('sliderRefine');
        const minSalary = parseInt($("#input-min-salary").val());
        const maxSalary = parseInt($("#input-max-salary").val());
        noUiSlider.create(slider2, {
            start: [minSalary, maxSalary],
            connect: true,
            step: 50,
            range: {
                'min': [100],
                'max': [10000]
            }
        });
        let val;
        slider2.noUiSlider.on('update', function (values, handle) {
            val = Math.round(values[handle]);
            if (handle) {
                $('#span-max-salary').text(val);
                $('#input-max-salary').val(val);
            } else {
                $('#span-min-salary').text(val);
                $('#input-min-salary').val(val);
            }
        });

    });
</script>

</body>
</html>
