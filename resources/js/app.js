require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Swal = require('sweetalert2');

/* Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success') */

  /* Se ejecuta cada vez que se crea o actualiza un registro */
Livewire.on('alertCreate', function(message) {
  Swal.fire(
    '',
    message,
    'success'
  )
});