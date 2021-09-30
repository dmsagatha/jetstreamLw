@push('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    window.addEventListener('show-delete-confirmation', event => {
      Swal.fire({
        title: 'Esta seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminarlo!'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('deleteConfirmed')
        }
      })
    })

    window.addEventListener('deleted', event => {
      Swal.fire(
        'Eliminado!',
        event.detail.message,
        'success'
      )
    })
  </script>
@endpush