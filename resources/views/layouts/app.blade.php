<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('/images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <style>
      [x-cloak] {
        display: none;
      }
    </style>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>
  <body class="h-screen overflow-hidden flex items-center justify-center bg-indigo-50 text-gray-700">
    <div class="w-full">
      <div x-data="{ isOpen: false }">
        <div class="flex h-screen bg-gray-100 font-sans">
          <div :class="isOpen ? 'block' : 'hidden'" @click="isOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 xxl:hidden">
          </div>

          <!-- Sidebar -->
          @include('layouts.includes.sidebar')

          <!-- Navbar, Contenido y Pie de página -->
          <div class="relative w-full flex flex-col h-screen overflow-x-hidden">
            <!-- Navbar -->
            @include('layouts.includes.navbar')
      
            <!-- Page Heading -->
            @if (isset($header))
              <header class="bg-gray-300 shadow mt-14">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-700">
                  {{ $header }}
                </div>
              </header>
            @endif
    
            <!-- Page Content -->
            <main class="flex-grow p-6">
              {{ $slot }}
            </main>

            <!-- Pie de página -->
            <footer class="w-full bg-white text-center text-md sm:text-lg p-4">
              <a target="_blank" href="https://laravel.com/" class="underline">Laravel</a>,  
              <a target="_blank" href="https://tailwindcss.com/docs" class="underline">Tailwind CSS</a> y 
              <a target="_blank" href="https://alpinejs.dev/" class="underline">Alpine Js</a>
            </footer>
          </div>
          <!-- Navbar, Contenido y Pie de página -->
        </div><!-- flex h-screen -->
      </div><!-- isOpen -->
    </div><!-- w-full -->

    @stack('modals')

    @livewireScripts
    
    @stack('scripts')

    <script>
      const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

      function app() {
          return {
              showDatepicker: false,
              datepickerValue: '',

              month: '',
              year: '',
              no_of_days: [],
              blankdays: [],
              days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

              initDate() {
                  let today = new Date();
                  this.month = today.getMonth();
                  this.year = today.getFullYear();
                  this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
              },
              isToday(date) {
                  const today = new Date();
                  const d = new Date(this.year, this.month, date);

                  return today.toDateString() === d.toDateString() ? true : false;
              },
              getDateValue(date) {
                  let selectedDate = new Date(this.year, this.month, date);
                  this.datepickerValue = selectedDate.toDateString();
                  this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ selectedDate.getMonth()).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);
                  console.log(this.$refs.date.value);

                  this.showDatepicker = false;
              },

              getNoOfDays() {
                  let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                  // find where to start calendar day of week
                  let dayOfWeek = new Date(this.year, this.month).getDay();
                  let blankdaysArray = [];
                  for ( var i=1; i <= dayOfWeek; i++) {
                      blankdaysArray.push(i);
                  }

                  let daysArray = [];
                  for ( var i=1; i <= daysInMonth; i++) {
                      daysArray.push(i);
                  }

                  this.blankdays = blankdaysArray;
                  this.no_of_days = daysArray;
              }
          }
      }
  </script>

    <script>
      function openMenu() {
        let menu = document.getElementById('menu');

        if (menu.classList.contains('hidden')) {
          menu.classList.remove('hidden');
        } else {
          menu.classList.add('hidden');
        }
      }
    </script>
  </body>
</html>