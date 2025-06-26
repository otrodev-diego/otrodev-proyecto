<div class="kt-card">
    <div class="kt-card-header" id="delete_account">
        <h3 class="kt-card-title">
            Eliminación cuenta
        </h3>
    </div>
    <div class="kt-card-content flex flex-col lg:py-7.5 lg:gap-7.5 gap-3">
        <div class="flex flex-col gap-5">
            <div class="text-sm text-foreground">
                Esta acción eliminará permanentemente la cuenta del usuario. Todos sus datos serán
                eliminados de forma irreversible. Gracias por haber formado parte de nuestra comunidad.
                Si
                está seguro de continuar, confirme la eliminación a continuación. Para más información,
                consulte nuestras Directrices de configuración.
            </div>
        </div>
        <div class="flex justify-end gap-2.5">

            <form id="delete-user-form" method="POST"
                  action="{{ route('users.destroy', $user->id) }}">
                @csrf
                @method('DELETE')
                <button type="button" class="kt-btn kt-btn-destructive" id="delete-user-button">
                    Eliminar cuenta
                </button>
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('delete-user-button').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción eliminará permanentemente al usuario!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-user-form').submit();
            }
        });
    });
</script>
