<html>
<head>
  <title>Datacenter Automation Suite&trade;</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<!--
  ```
  // tailwind.config.js
  const colors = require('tailwindcss/colors')

        colors: {
          cyan: colors.cyan,
        }

  ```
-->
<body>
<div class="flex flex-col h-screen overflow-hidden bg-gray-100">
  <!-- Top nav-->
  <header class="relative flex items-center flex-shrink-0 h-16 bg-white">
    <!-- Logo area -->
    <div class="absolute inset-y-0 left-0 lg:static lg:flex-shrink-0">
      <a href="#"
         class="flex items-center justify-center w-16 h-16 bg-cyan-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600 lg:w-20">
        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt="Workflow">
      </a>
    </div>

    <!-- Picker area -->
    <div class="mx-auto lg:hidden">
      <div class="relative">
        <label for="inbox-select" class="sr-only">Choose inbox</label>
        <select id="inbox-select"
                class="pl-3 pr-8 text-base font-medium text-gray-900 border-0 rounded-md bg-none focus:ring-2 focus:ring-blue-600">
          <option value="/open">Open</option>
          <option value="/archived">Archived</option>
          <option value="/assigned">Assigned</option>
          <option value="/flagged">Flagged</option>
          <option value="/spam">Spam</option>
          <option value="/drafts">Drafts</option>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center justify-center pr-2 pointer-events-none">
          <!-- Heroicon name: solid/chevron-down -->
          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
               aria-hidden="true">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- Menu button area -->
    <div class="absolute inset-y-0 right-0 flex items-center pr-4 sm:pr-6 lg:hidden">
      <!-- Mobile menu button -->
      <button type="button"
              class="inline-flex items-center justify-center p-2 -mr-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600">
        <span class="sr-only">Open main menu</span>
        <!-- Heroicon name: outline/menu -->
        <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <!-- Desktop nav area -->
    <div class="hidden lg:min-w-0 lg:flex-1 lg:flex lg:items-center lg:justify-between">
      <div class="flex-1 min-w-0">
        <div class="relative max-w-2xl text-gray-400 focus-within:text-gray-500">
          <label for="search" class="sr-only">Search all inboxes</label>
          <input id="search" type="search" placeholder="Search all inboxes"
                 class="block w-full pl-12 placeholder-gray-500 border-transparent focus:border-transparent sm:text-sm focus:ring-0">
          <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-4 pointer-events-none">
            <!-- Heroicon name: solid/search -->
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"/>
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center flex-shrink-0 pr-4 ml-10 space-x-10">
        <nav aria-label="Global" class="flex space-x-10">
          <div class="relative text-left">
            <button type="button"
                    class="flex items-center text-sm font-medium text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600"
                    id="menu-1" aria-expanded="false" aria-haspopup="true">
              <span>Inboxes</span>
              <!-- Heroicon name: solid/chevron-down -->
              <svg class="w-5 h-5 ml-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                   fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
              </svg>
            </button>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div
              class="absolute right-0 z-30 w-40 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="menu-1">
              <div class="py-1" role="none">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  Technical Support
                </a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  Sales
                </a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  General
                </a>
              </div>
            </div>
          </div>

          <a href="#" class="text-sm font-medium text-gray-900">Reporting</a>

          <a href="#" class="text-sm font-medium text-gray-900">Settings</a>
        </nav>
        <div class="flex items-center space-x-8">
            <span class="inline-flex">
              <a href="#" class="p-1 -mx-1 text-gray-400 bg-white rounded-full hover:text-gray-500">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
              </a>
            </span>

          <div class="relative inline-block text-left">
            <button type="button"
                    class="flex text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600"
                    id="menu-2" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full"
                   src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixqx=hFcIz7dS9K&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                   alt="">
            </button>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div
              class="absolute right-0 z-30 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="menu-2">
              <div class="py-1" role="none">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  Your Profile
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  Sign Out
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->

    <div class="fixed inset-0 z-40 lg:hidden" role="dialog" aria-modal="true">
      <!--
        Off-canvas menu overlay, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="hidden sm:block sm:fixed sm:inset-0 sm:bg-gray-600 sm:bg-opacity-75" aria-hidden="true"></div>

      <!--
        Mobile menu, toggle classes based on menu state.

        Entering: "transition ease-out duration-150 sm:ease-in-out sm:duration-300"
          From: "transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
          To: "transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
        Leaving: "transition ease-in duration-150 sm:ease-in-out sm:duration-300"
          From: "transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
          To: "transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
      -->
      <nav
        class="fixed inset-0 z-40 w-full h-full bg-white sm:inset-y-0 sm:left-auto sm:right-0 sm:max-w-sm sm:w-full sm:shadow-lg"
        aria-label="Global">
        <div class="flex items-center justify-between h-16 px-4 sm:px-6">
          <a href="#">
            <img class="block w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=cyan&shade=400"
                 alt="Workflow">
          </a>
          <button type="button"
                  class="inline-flex items-center justify-center p-2 -mr-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600">
            <span class="sr-only">Close main menu</span>
            <!-- Heroicon name: outline/x -->
            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
        <div class="px-4 mx-auto mt-2 max-w-8xl sm:px-6">
          <div class="relative text-gray-400 focus-within:text-gray-500">
            <label for="search" class="sr-only">Search all inboxes</label>
            <input id="search" type="search" placeholder="Search all inboxes"
                   class="block w-full pl-10 placeholder-gray-500 border-gray-300 rounded-md focus:border-blue-600 focus:ring-blue-600">
            <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">
              <!-- Heroicon name: solid/search -->
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="px-2 py-3 mx-auto max-w-8xl sm:px-4">
          <a href="#"
             class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100">Inboxes</a>

          <a href="#" class="block py-2 pl-5 pr-3 text-base font-medium text-gray-500 rounded-md hover:bg-gray-100">Technical
            Support</a>

          <a href="#" class="block py-2 pl-5 pr-3 text-base font-medium text-gray-500 rounded-md hover:bg-gray-100">Sales</a>

          <a href="#" class="block py-2 pl-5 pr-3 text-base font-medium text-gray-500 rounded-md hover:bg-gray-100">General</a>

          <a href="#"
             class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100">Reporting</a>

          <a href="#"
             class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100">Settings</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
          <div class="flex items-center px-4 mx-auto max-w-8xl sm:px-6">
            <div class="flex-shrink-0">
              <img class="w-10 h-10 rounded-full"
                   src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixqx=hFcIz7dS9K&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                   alt="">
            </div>
            <div class="flex-1 min-w-0 ml-3">
              <div class="text-base font-medium text-gray-800 truncate">Whitney Francis</div>
              <div class="text-sm font-medium text-gray-500 truncate">whitneyfrancis@example.com</div>
            </div>
            <a href="#" class="flex-shrink-0 p-2 ml-auto text-gray-400 bg-white hover:text-gray-500">
              <span class="sr-only">View notifications</span>
              <!-- Heroicon name: outline/bell -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
              </svg>
            </a>
          </div>
          <div class="px-2 mx-auto mt-3 space-y-1 max-w-8xl sm:px-4">
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Your
              Profile</a>

            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Sign
              out</a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Bottom section -->
  <div class="flex flex-1 min-h-0 overflow-hidden">
    <!-- Narrow sidebar-->
    <nav aria-label="Sidebar" class="hidden lg:block lg:flex-shrink-0 lg:bg-gray-800 lg:overflow-y-auto">
      <div class="relative flex flex-col w-20 p-3 space-y-3">
        <a href="#"
           class="inline-flex items-center justify-center flex-shrink-0 text-white bg-gray-900 rounded-lg h-14 w-14">
          <span class="sr-only">Open</span>
          <!-- Heroicon name: outline/inbox -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
          </svg>
        </a>

        <a href="#"
           class="inline-flex items-center justify-center flex-shrink-0 text-gray-400 rounded-lg hover:bg-gray-700 h-14 w-14">
          <span class="sr-only">Archive</span>
          <!-- Heroicon name: outline/archive -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
          </svg>
        </a>

        <a href="#"
           class="inline-flex items-center justify-center flex-shrink-0 text-gray-400 rounded-lg hover:bg-gray-700 h-14 w-14">
          <span class="sr-only">Customers</span>
          <!-- Heroicon name: outline/user-circle -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </a>

        <a href="#"
           class="inline-flex items-center justify-center flex-shrink-0 text-gray-400 rounded-lg hover:bg-gray-700 h-14 w-14">
          <span class="sr-only">Flagged</span>
          <!-- Heroicon name: outline/flag -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
          </svg>
        </a>

        <a href="#"
           class="inline-flex items-center justify-center flex-shrink-0 text-gray-400 rounded-lg hover:bg-gray-700 h-14 w-14">
          <span class="sr-only">Spam</span>
          <!-- Heroicon name: outline/ban -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
          </svg>
        </a>

        <a href="#"
           class="inline-flex items-center justify-center flex-shrink-0 text-gray-400 rounded-lg hover:bg-gray-700 h-14 w-14">
          <span class="sr-only">Drafts</span>
          <!-- Heroicon name: outline/pencil-alt -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
               aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
          </svg>
        </a>
      </div>
    </nav>

    <!-- Main area -->
    <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">
      <section aria-labelledby="message-heading"
               class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">
        <!-- Top section -->
        <div class="flex-shrink-0 bg-white border-b border-gray-200">
          <!-- Toolbar-->
          <div class="flex flex-col justify-center h-16">
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="flex justify-between py-3">
                <!-- Left buttons -->
                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm sm:shadow-none sm:space-x-3">
                      <span class="inline-flex sm:shadow-sm">
                        <button type="button"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                          <!-- Heroicon name: solid/reply -->
                          <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                  clip-rule="evenodd"/>
                          </svg>
                          <span>Reply</span>
                        </button>
                        <button type="button"
                                class="relative items-center hidden px-4 py-2 -ml-px text-sm font-medium text-gray-900 bg-white border border-gray-300 sm:inline-flex hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                          <!-- Heroicon name: solid/pencil -->
                          <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path
                              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                          </svg>
                          <span>Note</span>
                        </button>
                        <button type="button"
                                class="relative items-center hidden px-4 py-2 -ml-px text-sm font-medium text-gray-900 bg-white border border-gray-300 sm:inline-flex rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                          <!-- Heroicon name: solid/user-add -->
                          <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path
                              d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                          </svg>
                          <span>Assign</span>
                        </button>
                      </span>

                      <span class="hidden space-x-3 lg:flex">
                        <button type="button"
                                class="relative items-center hidden px-4 py-2 -ml-px text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-md sm:inline-flex hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                          <!-- Heroicon name: solid/archive -->
                          <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
                            <path fill-rule="evenodd"
                                  d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                  clip-rule="evenodd"/>
                          </svg>
                          <span>Archive</span>
                        </button>
                        <button type="button"
                                class="relative items-center hidden px-4 py-2 -ml-px text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-md sm:inline-flex hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                          <!-- Heroicon name: solid/folder-download -->
                          <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/>
                            <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 9v4m0 0l-2-2m2 2l2-2"/>
                          </svg>
                          <span>Move</span>
                        </button>
                      </span>

                      <span class="relative block -ml-px sm:shadow-sm lg:hidden">
                        <div>
                          <button type="button"
                                  class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 sm:rounded-md sm:px-3"
                                  id="menu-3" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only sm:hidden">More</span>
                            <span class="hidden sm:inline">More</span>
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="w-5 h-5 text-gray-400 sm:ml-2 sm:-mr-1" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"/>
                            </svg>
                          </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div
                          class="absolute right-0 mt-2 origin-top-right bg-white rounded-md shadow-lg w-36 ring-1 ring-black ring-opacity-5 focus:outline-none"
                          role="menu" aria-orientation="vertical" aria-labelledby="menu-3">
                          <div class="py-1" role="none">
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 sm:hidden hover:bg-gray-100 hover:text-gray-900"
                               role="menuitem">
                              Note
                            </a>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 sm:hidden hover:bg-gray-100 hover:text-gray-900"
                               role="menuitem">
                              Assign
                            </a>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                               role="menuitem">
                              Archive
                            </a>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                               role="menuitem">
                              Move
                            </a>
                          </div>
                        </div>
                      </span>
                    </span>
                </div>

                <!-- Right buttons -->
                <nav aria-label="Pagination">
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                      <a href="#"
                         class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                        <span class="sr-only">Next</span>
                        <!-- Heroicon name: solid/chevron-up -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                          <path fill-rule="evenodd"
                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                clip-rule="evenodd"/>
                        </svg>
                      </a>
                      <a href="#"
                         class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                        <span class="sr-only">Previous</span>
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                          <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"/>
                        </svg>
                      </a>
                    </span>
                </nav>
              </div>
            </div>
          </div>
          <!-- Message header -->
        </div>

        <div class="flex-1 min-h-0 overflow-y-auto">
          <div class="pt-5 pb-6 bg-white shadow">
            <div class="px-4 sm:flex sm:justify-between sm:items-baseline sm:px-6 lg:px-8">
              <div class="sm:w-0 sm:flex-1">
                <h1 id="message-heading" class="text-lg font-medium text-gray-900">
                  Re: New pricing for existing customers
                </h1>
                <p class="mt-1 text-sm text-gray-500 truncate">
                  joearmstrong@example.com
                </p>
              </div>

              <div class="flex items-center justify-between mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:justify-start">
                  <span
                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-cyan-100 text-cyan-800">
                    Open
                  </span>
                <div class="relative inline-block ml-3 text-left">
                  <div>
                    <button type="button"
                            class="flex items-center p-2 -my-2 text-gray-400 bg-white rounded-full hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-600"
                            id="menu-4" aria-expanded="false" aria-haspopup="true">
                      <span class="sr-only">Open options</span>
                      <!-- Heroicon name: solid/dots-vertical -->
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                           aria-hidden="true">
                        <path
                          d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                      </svg>
                    </button>
                  </div>

                  <!--
                    Dropdown menu, show/hide based on menu state.

                    Entering: "transition ease-out duration-100"
                      From: "transform opacity-0 scale-95"
                      To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                      From: "transform opacity-100 scale-100"
                      To: "transform opacity-0 scale-95"
                  -->
                  <div
                    class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-4">
                    <div class="py-1" role="none">
                      <button type="button"
                              class="flex justify-between w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                              role="menuitem">
                        <span>Copy email address</span>
                      </button>
                      <a href="#"
                         class="flex justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                         role="menuitem">
                        <span>Previous conversations</span>
                      </a>
                      <a href="#"
                         class="flex justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                         role="menuitem">
                        <span>View original</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Thread section-->
          <ul class="py-4 space-y-2 sm:px-6 sm:space-y-4 lg:px-8">
            <li class="px-4 py-6 bg-white shadow sm:rounded-lg sm:px-6">
              <div class="sm:flex sm:justify-between sm:items-baseline">
                <h3 class="text-base font-medium">
                  <span class="text-gray-900">Joe Armstrong</span>
                  <span class="text-gray-600">wrote</span>
                </h3>
                <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                  <time datetime="2021-01-28T19:24">Yesterday at 7:24am</time>
                </p>
              </div>
              <div class="mt-4 space-y-6 text-sm text-gray-800">
                <p>Thanks so much! Can't wait to try it out.</p>
              </div>
            </li>

            <li class="px-4 py-6 bg-white shadow sm:rounded-lg sm:px-6">
              <div class="sm:flex sm:justify-between sm:items-baseline">
                <h3 class="text-base font-medium">
                  <span class="text-gray-900">Monica White</span>
                  <span class="text-gray-600">wrote</span>
                </h3>
                <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                  <time datetime="2021-01-27T16:35">Wednesday at 4:35pm</time>
                </p>
              </div>
              <div class="mt-4 space-y-6 text-sm text-gray-800">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Malesuada at ultricies tincidunt elit et,
                  enim. Habitant nunc, adipiscing non fermentum, sed est a, aliquet. Lorem in vel libero vel augue
                  aliquet dui commodo.
                </p>
                <p>
                  Nec malesuada sed sit ut aliquet. Cras ac pharetra, sapien purus vitae vestibulum auctor faucibus
                  ullamcorper. Leo quam tincidunt porttitor neque, velit sed. Tortor mauris ornare ut tellus sed aliquet
                  amet venenatis condimentum. Convallis accumsan et nunc eleifend.
                </p>
                <p>
                  <strong style="font-weight: 600;">Monica White</strong><br>
                  Customer Service
                </p>
              </div>
            </li>

            <li class="px-4 py-6 bg-white shadow sm:rounded-lg sm:px-6">
              <div class="sm:flex sm:justify-between sm:items-baseline">
                <h3 class="text-base font-medium">
                  <span class="text-gray-900">Joe Armstrong</span>
                  <span class="text-gray-600">wrote</span>
                </h3>
                <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                  <time datetime="2021-01-27T16:09">Wednesday at 4:09pm</time>
                </p>
              </div>
              <div class="mt-4 space-y-6 text-sm text-gray-800">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Malesuada at ultricies tincidunt elit et,
                  enim. Habitant nunc, adipiscing non fermentum, sed est a, aliquet. Lorem in vel libero vel augue
                  aliquet dui commodo.
                </p>
                <p>
                  Nec malesuada sed sit ut aliquet. Cras ac pharetra, sapien purus vitae vestibulum auctor faucibus
                  ullamcorper. Leo quam tincidunt porttitor neque, velit sed. Tortor mauris ornare ut tellus sed aliquet
                  amet venenatis condimentum. Convallis accumsan et nunc eleifend.
                </p>
                <p>
                  – Joe
                </p>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <!-- Message list-->
      <aside class="hidden xl:block xl:flex-shrink-0 xl:order-first">
        <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
          <div class="flex-shrink-0">
            <div class="flex flex-col justify-center h-16 px-6 bg-white">
              <div class="flex items-baseline space-x-3">
                <h2 class="text-lg font-medium text-gray-900">Inbox</h2>
                <p class="text-sm font-medium text-gray-500">10 messages</p>
              </div>
            </div>
            <div class="px-6 py-2 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
              Sorted by date
            </div>
          </div>
          <nav aria-label="Message list" class="flex-1 min-h-0 overflow-y-auto">
            <ul class="border-b border-gray-200 divide-y divide-gray-200">
              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Gloria Roberston</p>
                      <p class="text-sm text-gray-500 truncate">Velit placeat sit ducimus non sed</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Virginia Abshire</p>
                      <p class="text-sm text-gray-500 truncate">Nemo mollitia repudiandae adipisci explicabo optio
                        consequatur tempora ut nihil</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Kyle Gulgowski</p>
                      <p class="text-sm text-gray-500 truncate">Doloremque reprehenderit et harum quas explicabo nulla
                        architecto dicta voluptatibus</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Hattie Haag</p>
                      <p class="text-sm text-gray-500 truncate">Eos sequi et aut ex impedit</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Wilma Glover</p>
                      <p class="text-sm text-gray-500 truncate">Quisquam veniam explicabo</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Dolores Morissette</p>
                      <p class="text-sm text-gray-500 truncate">Est ratione molestiae modi maiores consequatur eligendi
                        et excepturi magni</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Guadalupe Walsh</p>
                      <p class="text-sm text-gray-500 truncate">Commodi deserunt aut veniam rem ipsam</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Jasmine Hansen</p>
                      <p class="text-sm text-gray-500 truncate">Illo illum aut debitis earum</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Ian Volkman</p>
                      <p class="text-sm text-gray-500 truncate">Qui dolore iste ut est cumque sed</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>

              <li
                class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                <div class="flex justify-between space-x-3">
                  <div class="flex-1 min-w-0">
                    <a href="#" class="block focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900 truncate">Rafael Klocko</p>
                      <p class="text-sm text-gray-500 truncate">Aut sed aut illum delectus maiores laboriosam ex</p>
                    </a>
                  </div>
                  <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d
                    ago
                  </time>
                </div>
                <div class="mt-1">
                  <p class="text-sm text-gray-600 line-clamp-2">
                    Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                    eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt maiores et
                    accusamus quod dolor.
                  </p>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
    </main>
  </div>
</div>
</body>
</html>
