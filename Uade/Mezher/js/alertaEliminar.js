document.addEventListener('DOMContentLoaded', function() {
  const botonesEliminar = document.querySelectorAll('.eliminar-btn');

  botonesEliminar.forEach(boton => {
    boton.addEventListener('click', function(e) {
      e.preventDefault();
      const id = this.getAttribute('data-id');

      Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás deshacer esta acción.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirigir a eliminar.php si el usuario confirma
          window.location.href = `eliminar.php?id=${id}`;
        }
      });
    });
  });
});
