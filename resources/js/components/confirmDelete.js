import Swal from 'sweetalert2';

const swalWithTailwindButtons = Swal.mixin({
    customClass: {
        confirmButton: 'bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2',
        cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2',
        
    },
    buttonsStyling: false,
});

export function confirmDelete({
    formId,
    title = '¿Estás seguro?',
    text = '¡Esta acción no se puede deshacer!',
    confirmText = 'Sí, eliminar',
    cancelText = 'Cancelar',
    successTitle = '¡Eliminado!',
    successText = 'El usuario ha sido eliminado.',
    cancelTitle = 'Cancelado',
    cancelTextResponse = 'La acción fue cancelada.',
}) {
    swalWithTailwindButtons.fire({
        title,
        text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithTailwindButtons.fire({
                title: successTitle,
                text: successText,
                icon: 'success',
            }).then(() => {
                document.getElementById(formId)?.submit();
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithTailwindButtons.fire({
                title: cancelTitle,
                text: cancelTextResponse,
                icon: 'error',
            });
        }
    });
}
