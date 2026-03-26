@if(session('success'))
    <div class="alert alert-success alert-dimissible d-flex align-items-center fade show">

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
        }, 5000)
    </script>

@endif