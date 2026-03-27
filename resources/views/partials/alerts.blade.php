@if(session('success'))
    <div id class="alert alert-success alert-dimissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">EXITO</strong> {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function(){
            let alerta = document.getElementById('alert');
            if (alerta) {
                
                alerta.classList.remove('show');

                alerta.classList.add('fade');

                setTimeout(() => alerta.remove(), 500);
            }
        }, 5000);
    </script>
@endif

@if(session('error'))
    <div id="alert" class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-xmark"></i>
        <strong class="mx-2">ERROR</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function(){
            let alerta = document.getElementById('alert');
            if (alerta) {
                
                alerta.classList.remove('show');

                alerta.classList.add('fade');

                setTimeout(() => alerta.remove(), 500);
            }
        }, 5000);
    </script>
@endif
