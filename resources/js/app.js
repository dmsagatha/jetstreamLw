require('./bootstrap');

import Alpine from 'alpinejs';

import flatpickr from "flatpickr";

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

// Date Picker Flatpickr
flatpickr(".flatpickr", {
  dateFormat: "Y-m-d"
});