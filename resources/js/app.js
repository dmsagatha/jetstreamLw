require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Swal = require('sweetalert2');

/* Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success') */
Livewire.on('alert', function(message) {
  Swal.fire(
    'Good job!',
    message,
    'success'
  )
});