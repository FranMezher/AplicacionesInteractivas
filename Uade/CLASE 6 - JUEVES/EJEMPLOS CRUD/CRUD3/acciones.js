// Este archivo JavaScript maneja los eventos para llenar los modales de edición y eliminación

// Espera a que el DOM esté cargado
document.addEventListener('DOMContentLoaded', function () {

// Al hacer clic en editar, completa los campos del modal con los datos del botón

/*document.querySelectorAll('.btnEditar')
busca todos los botones con la clase btnEditar
en nuestro caso son los botones de editar generados en la tabla HTML y les agrega un evento de clic*/

/* .forEach(function (btn) { ... })
recorre cada uno de los botones encontrados y ejecuta la función que se pasa como argumento.
btn representa cada botón individual con clase .btnEditar*/

/*btn.addEventListener('click', function () { ... })
se asocia un evento de clic a cada botón. Cuando se hace clic en un botón, se ejecuta la función que se pasa como argumento. Dentro de esta función, se accede a los atributos data-* del botón para llenar los campos del modal de edición.*/

/* ¿Qué hace this.dataset.X? 
this se refiere al botón que fue clickeado.
.dataset accede a todos los data-* atributos definidos en el botón HTML. Por ejemplo, this.dataset.id obtendría el valor del atributo data-id del botón.
*/

  document.querySelectorAll('.btnEditar').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.getElementById('edit-id').value = this.dataset.id;
      document.getElementById('edit-nombre').value = this.dataset.nombre;
      document.getElementById('edit-email').value = this.dataset.email;
    });
  });

  // Al hacer clic en eliminar, pasa el ID al modal
  document.querySelectorAll('.btnEliminar').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.getElementById('delete-id').value = this.dataset.id;
    });
  });

});
