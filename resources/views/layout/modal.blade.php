<div class="modal fade" id=@yield('id') tabindex="-1" role="dialog" aria-labelledby="@yield('id')Label">
    <div class="modal-dialog @yield('tamano','modal-lg')" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title" style="text-align: center; color: crimson" id="myModalLabel">@yield('titulo')</h1>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                @yield('contenido')
                </div>
            </div>

        </div>
    </div>
</div>