<head>
  <title>Datacenter Automation Suite&trade;</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

{{-- <div class="bg-gray-800">
  <div class="px-4 py-16 mx-auto max-w-7xl sm:py-24 sm:px-6 lg:px-8 lg:flex lg:justify-between">
    <div class="max-w-xl">
      <h2 class="text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">Pricing Plans</h2>
      <p class="mt-5 text-xl text-gray-400">Start building for free, then add a site plan to go live. Account plans unlock additional features.</p>
    </div>
    <div class="w-full max-w-xs mt-10">
      <label for="currency" class="block text-base font-medium text-gray-300">Currency</label>
      <div class="mt-1.5 relative">
        <select id="currency" name="currency" class="block w-full py-2 pl-3 pr-10 text-base text-white bg-gray-700 border border-transparent rounded-md appearance-none bg-none focus:outline-none focus:ring-1 focus:ring-white focus:border-white sm:text-sm">
          <option>Argentina (ARS)</option>
          <option>Australia (AUD)</option>
          <option selected>United States (USD)</option>
          <option>Canada (CAD)</option>
          <option>France (EUR)</option>
          <option>Japan (JPY)</option>
          <option>Nigeria (NGN)</option>
          <option>Switzerland (CHF)</option>
          <option>United Kingdom (GBP)</option>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
          <!-- Heroicon name: solid/chevron-down -->
          <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="flex h-screen overflow-hidden bg-gray-100">
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <div class="md:hidden">
    <div class="fixed inset-0 z-40 flex">
      <!--
          Off-canvas menu overlay, show/hide based on off-canvas menu state.

          Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
      <div class="fixed inset-0" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
      </div>
      <!--
          Off-canvas menu, show/hide based on off-canvas menu state.

          Entering: "transition ease-in-out duration-300 transform"
            From: "-translate-x-full"
            To: "translate-x-0"
          Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "-translate-x-full"
        -->
      <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-gray-800">
        <div class="absolute top-0 right-0 pt-2 -mr-12">
          <button
            class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
            <span class="sr-only">Close sidebar</span>
            <!-- Heroicon name: outline/x -->
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
        <div class="flex items-center flex-shrink-0 px-4">
          <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
               alt="Workflow">
        </div>
        <div class="flex-1 h-0 mt-5 overflow-y-auto">
          <nav class="px-2 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#"
               class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-900 rounded-md group">
              <!-- Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300" -->
              <!-- Heroicon name: outline/home -->
              <svg class="w-6 h-6 mr-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
              Dashboard
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/users -->
              <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
              </svg>
              Team
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/folder -->
              <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
              </svg>
              Projects
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/calendar -->
              <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              Calendar
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/inbox -->
              <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
              </svg>
              Documents
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/chart-bar -->
              <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
              Reports
            </a>
          </nav>
        </div>
      </div>
      <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
      </div>
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-col flex-1 h-0">
        <div class="flex items-center flex-shrink-0 h-16 px-4 bg-gray-900">
          <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
               alt="Workflow">
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
          <nav class="flex-1 px-2 py-4 space-y-1 bg-gray-800">
            <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group">
              <!-- Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300" -->
              <!-- Heroicon name: outline/home -->
              <svg class="w-6 h-6 mr-3 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
              Dashboard
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/users -->
              <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
              </svg>
              Team
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/folder -->
              <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
              </svg>
              Projects
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/calendar -->
              <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              Calendar
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/inbox -->
              <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
              </svg>
              Documents
            </a>

            <a href="#"
               class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: outline/chart-bar -->
              <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
              Reports
            </a>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="flex flex-col flex-1 w-0 overflow-hidden">
    <div class="relative z-10 flex flex-shrink-0 h-16 bg-white shadow">
      <button
        class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu-alt-2 -->
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
        </svg>
      </button>
      <div class="flex justify-between flex-1 px-4">
        <div class="flex flex-1">
          <form class="flex w-full md:ml-0" action="#" method="GET">
            <label for="search_field" class="sr-only">Search</label>
            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
              <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/search -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                  <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"/>
                </svg>
              </div>
              <input id="search_field"
                     class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm"
                     placeholder="Search" type="search" name="search">
            </div>
          </form>
        </div>
        <div class="flex items-center ml-4 md:ml-6">
          <button
            class="p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button"
                      class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      id="user-menu" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full"
                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=hFcIz7dS9K&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                     alt="">
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
            {{-- <div
              class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
                Profile</a>

              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>

              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>

    <main class="relative flex-1 overflow-y-auto focus:outline-none" tabindex="0">
      <div class="py-6">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
          <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
        </div>

        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
          <!-- Replace with your content -->


          <!-- This example requires Tailwind CSS v2.0+ -->
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Last 30 days
            </h3>

            <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-3">
              <div class="relative px-4 pt-5 pb-12 overflow-hidden bg-white rounded-lg shadow sm:pt-6 sm:px-6">
                <dt>
                  <div class="absolute p-3 bg-indigo-500 rounded-md">
                    <!-- Heroicon name: outline/users -->
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                  </div>
                  <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Subscribers</p>
                </dt>
                <dd class="flex items-baseline pb-6 ml-16 sm:pb-7">
                  <p class="text-2xl font-semibold text-gray-900">
                    71,897
                  </p>
                  <p class="flex items-baseline ml-2 text-sm font-semibold text-green-600">
                    <svg class="self-center flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                         viewBox="0 0 20 20" aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">
            Increased by
          </span>
                    122
                  </p>
                  <div class="absolute inset-x-0 bottom-0 px-4 py-4 bg-gray-50 sm:px-6">
                    <div class="text-sm">
                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span
                          class="sr-only"> Total Subscribers stats</span></a>
                    </div>
                  </div>
                </dd>
              </div>

              <div class="relative px-4 pt-5 pb-12 overflow-hidden bg-white rounded-lg shadow sm:pt-6 sm:px-6">
                <dt>
                  <div class="absolute p-3 bg-indigo-500 rounded-md">
                    <!-- Heroicon name: outline/mail-open -->
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/>
                    </svg>
                  </div>
                  <p class="ml-16 text-sm font-medium text-gray-500 truncate">Avg. Open Rate</p>
                </dt>
                <dd class="flex items-baseline pb-6 ml-16 sm:pb-7">
                  <p class="text-2xl font-semibold text-gray-900">
                    58.16%
                  </p>
                  <p class="flex items-baseline ml-2 text-sm font-semibold text-green-600">
                    <svg class="self-center flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                         viewBox="0 0 20 20" aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">
            Increased by
          </span>
                    5.4%
                  </p>
                  <div class="absolute inset-x-0 bottom-0 px-4 py-4 bg-gray-50 sm:px-6">
                    <div class="text-sm">
                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span
                          class="sr-only"> Avg. Open Rate stats</span></a>
                    </div>
                  </div>
                </dd>
              </div>

              <div class="relative px-4 pt-5 pb-12 overflow-hidden bg-white rounded-lg shadow sm:pt-6 sm:px-6">
                <dt>
                  <div class="absolute p-3 bg-indigo-500 rounded-md">
                    <!-- Heroicon name: outline/cursor-click -->
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                    </svg>
                  </div>
                  <p class="ml-16 text-sm font-medium text-gray-500 truncate">Avg. Click Rate</p>
                </dt>
                <dd class="flex items-baseline pb-6 ml-16 sm:pb-7">
                  <p class="text-2xl font-semibold text-gray-900">
                    24.57%
                  </p>
                  <p class="flex items-baseline ml-2 text-sm font-semibold text-red-600">
                    <svg class="self-center flex-shrink-0 w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"
                         aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">
            Decreased by
          </span>
                    3.2%
                  </p>
                  <div class="absolute inset-x-0 bottom-0 px-4 py-4 bg-gray-50 sm:px-6">
                    <div class="text-sm">
                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span
                          class="sr-only"> Avg. Click Rate stats</span></a>
                    </div>
                  </div>
                </dd>
              </div>
            </dl>
          </div>


          </dl>
        </div>


      </div>
      <!-- /End replace -->
  </div>
</div>
</main>
</div>
</div>
e
