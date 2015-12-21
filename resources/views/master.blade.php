@include('shared.header')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('shared.navbar')

    @include('shared.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <section class="content">

          <!-- Your Page Content Here -->

        </section>
    </div>

    @include('shared.footer')

</div>

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
<script src="/adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="/adminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminLTE/dist/js/app.min.js"></script>

@yield('extra-scripts')


</body>
</html>
