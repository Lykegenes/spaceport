<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">@yield('panel-title', 'Panel Title')</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="box-body">
        @yield('panel-content', 'Panel Content')
    </div>

    <div class="box-footer">
        @yield('panel-footer', 'Panel Footer')
    </div>

</div>
