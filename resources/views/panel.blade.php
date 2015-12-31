<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">@yield('panel-title', 'Panel Title')</h3>
    </div>

    <div class="box-body">
        @yield('panel-content', 'Panel Content')
    </div>

    <div class="box-footer">
        @yield('panel-footer', 'Panel Footer')
    </div>

</div>
