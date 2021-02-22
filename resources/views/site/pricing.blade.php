<!DOCTYPE html>
<html lang="en">
<head>
    <title>Datacenter Automation Suite&trade;</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="bg-white">
  <div class="relative bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6">
      <div class="flex items-center justify-between py-6 border-b border-gray-200 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">Workflow</span>
            <img class="w-auto h-8 sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-purple-600.svg" alt="">
          </a>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
          <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/menu -->
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        <nav class="hidden space-x-10 md:flex">
          <div class="relative">
            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
            <button type="button" class="inline-flex items-center text-base font-medium text-gray-500 bg-white rounded-md group hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" aria-expanded="false">
              <span>Solutions</span>
              <!--
                Heroicon name: solid/chevron-down

                Item active: "text-gray-600", Item inactive: "text-gray-400"
              -->
              <svg class="w-5 h-5 ml-2 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>

            <!--
              'Solutions' flyout menu, show/hide based on flyout menu state.

              Entering: "transition ease-out duration-200"
                From: "opacity-0 translate-y-1"
                To: "opacity-100 translate-y-0"
              Leaving: "transition ease-in duration-150"
                From: "opacity-100 translate-y-0"
                To: "opacity-0 translate-y-1"
            -->
            {{-- <div class="absolute z-10 w-screen max-w-md px-2 mt-3 -ml-4 transform sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
              <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="relative grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">
                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Analytics
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Get a better understanding of where your traffic is coming from.
                      </p>
                    </div>
                  </a>

                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/cursor-click -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Engagement
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Speak directly to your customers in a more meaningful way.
                      </p>
                    </div>
                  </a>

                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/shield-check -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Security
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Your customers&#039; data will be safe and secure.
                      </p>
                    </div>
                  </a>

                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/view-grid -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Integrations
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Connect with third-party tools that you&#039;re already using.
                      </p>
                    </div>
                  </a>

                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/refresh -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Automations
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Build strategic funnels that will drive your customers to convert
                      </p>
                    </div>
                  </a>
                </div>
                <div class="px-5 py-5 space-y-6 bg-gray-50 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
                  <div class="flow-root">
                    <a href="#" class="flex items-center p-3 -m-3 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100">
                      <!-- Heroicon name: outline/play -->
                      <svg class="flex-shrink-0 w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <span class="ml-3">Watch Demo</span>
                    </a>
                  </div>

                  <div class="flow-root">
                    <a href="#" class="flex items-center p-3 -m-3 text-base font-medium text-gray-900 rounded-md hover:bg-gray-100">
                      <!-- Heroicon name: outline/phone -->
                      <svg class="flex-shrink-0 w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                      <span class="ml-3">Contact Sales</span>
                    </a>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>

          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
            Pricing
          </a>
          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
            Docs
          </a>

          <div class="relative">
            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
            <button type="button" class="inline-flex items-center text-base font-medium text-gray-500 bg-white rounded-md group hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" aria-expanded="false">
              <span>More</span>
              <!--
                Heroicon name: solid/chevron-down

                Item active: "text-gray-600", Item inactive: "text-gray-400"
              -->
              <svg class="w-5 h-5 ml-2 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>

            <!--
              'More' flyout menu, show/hide based on flyout menu state.

              Entering: "transition ease-out duration-200"
                From: "opacity-0 translate-y-1"
                To: "opacity-100 translate-y-0"
              Leaving: "transition ease-in duration-150"
                From: "opacity-100 translate-y-0"
                To: "opacity-0 translate-y-1"
            -->
            {{-- <div class="absolute z-10 w-screen max-w-md px-2 mt-3 transform -translate-x-1/2 left-1/2 sm:px-0">
              <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="relative grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">
                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/support -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Help Center
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Get all of your questions answered in our forums or contact support.
                      </p>
                    </div>
                  </a>

                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/bookmark-alt -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Guides
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Learn how to maximize our platform to get the most out of it.
                      </p>
                    </div>
                  </a>

                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/calendar -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Events
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        See what meet-ups and other events we might be planning near you.
                      </p>
                    </div>
                  </a>

                  <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/shield-check -->
                    <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">
                        Security
                      </p>
                      <p class="mt-1 text-sm text-gray-500">
                        Understand how we take your privacy seriously.
                      </p>
                    </div>
                  </a>
                </div>
                <div class="px-5 py-5 bg-gray-50 sm:px-8 sm:py-8">
                  <div>
                    <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase">
                      Recent Posts
                    </h3>
                    <ul class="mt-4 space-y-4">
                      <li class="text-base truncate">
                        <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                          Boost your conversion rate
                        </a>
                      </li>

                      <li class="text-base truncate">
                        <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                          How to use search engine optimization to drive traffic to your site
                        </a>
                      </li>

                      <li class="text-base truncate">
                        <a href="#" class="font-medium text-gray-900 hover:text-gray-700">
                          Improve your customer experience
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="mt-5 text-sm">
                    <a href="#" class="font-medium text-purple-600 hover:text-purple-500"> View all posts <span aria-hidden="true">&rarr;</span></a>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </nav>
        <div class="items-center justify-end hidden space-x-8 md:flex md:flex-1 lg:w-0">
          <a href="#" class="text-base font-medium text-gray-500 whitespace-nowrap hover:text-gray-900">
            Sign in
          </a>
          <a href="#" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium text-purple-600 bg-purple-100 border border-transparent rounded-md whitespace-nowrap hover:bg-purple-200">
            Sign up
          </a>
        </div>
      </div>
    </div>

    <!--
      Mobile menu, show/hide based on mobile menu state.

      Entering: "duration-200 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
    <div class="absolute inset-x-0 top-0 z-10 p-2 transition origin-top-right transform md:hidden">
      <div class="bg-white divide-y-2 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 divide-gray-50">
        <div class="px-5 pt-5 pb-6 space-y-6">
          <div class="flex items-center justify-between">
            <div>
              <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-purple-600.svg" alt="Workflow">
            </div>
            <div class="-mr-2">
              <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <div class="mt-6">
            <nav class="grid gap-y-8">
              <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                <!-- Heroicon name: outline/chart-bar -->
                <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="ml-3 text-base font-medium text-gray-900">
                  Analytics
                </span>
              </a>

              <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                <!-- Heroicon name: outline/cursor-click -->
                <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                </svg>
                <span class="ml-3 text-base font-medium text-gray-900">
                  Engagement
                </span>
              </a>

              <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                <!-- Heroicon name: outline/shield-check -->
                <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span class="ml-3 text-base font-medium text-gray-900">
                  Security
                </span>
              </a>

              <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                <!-- Heroicon name: outline/view-grid -->
                <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="ml-3 text-base font-medium text-gray-900">
                  Integrations
                </span>
              </a>

              <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                <!-- Heroicon name: outline/refresh -->
                <svg class="flex-shrink-0 w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span class="ml-3 text-base font-medium text-gray-900">
                  Automations
                </span>
              </a>
            </nav>
          </div>
        </div>
        <div class="px-5 py-6 space-y-6">
          <div class="grid grid-cols-2 gap-y-4 gap-x-8">
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Pricing
            </a>

            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Docs
            </a>

            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Enterprise
            </a>

            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Blog
            </a>

            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Help Center
            </a>

            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Guides
            </a>

            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Security
            </a>

            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Events
            </a>
          </div>
          <div class="space-y-6">
            <a href="#" class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700">
              Sign up
            </a>
            <p class="text-base font-medium text-center text-gray-500">
              Existing customer?
              <a href="#" class="text-purple-600 hover:text-purple-500">
                Sign in
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pricing with four tiers and toggle -->
  <div class="bg-gradient-to-b from-white to-gray-50">
    <div class="px-4 pt-24 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="sm:flex sm:flex-col sm:align-center">
        <h1 class="text-5xl font-extrabold text-gray-900 sm:text-center">Pricing Plans</h1>
        <p class="mt-5 text-xl text-gray-500 sm:text-center">Start building for free, then add a site plan to go live. Account plans unlock additional features.</p>
        <div class="relative mt-6 bg-gray-100 rounded-lg p-0.5 flex self-center sm:mt-8">
          <button type="button" class="relative w-1/2 py-2 text-sm font-medium text-gray-700 bg-white border-gray-200 rounded-md shadow-sm whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-purple-500 focus:z-10 sm:w-auto sm:px-8">Monthly billing</button>
          <button type="button" class="ml-0.5 relative border border-transparent rounded-md py-2 w-1/2 text-sm font-medium text-gray-700 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-purple-500 focus:z-10 sm:w-auto sm:px-8">Yearly billing</button>
        </div>
      </div>
      <div class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4">
        <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
          <div class="p-6">
            <h2 class="text-lg font-medium leading-6 text-gray-900">Hobby</h2>
            <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
            <p class="mt-8">
              <span class="text-4xl font-extrabold text-gray-900">$12</span>
              <span class="text-base font-medium text-gray-500">/mo</span>
            </p>
            <a href="#" class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700">Buy Hobby</a>
          </div>
          <div class="px-6 pt-6 pb-8">
            <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
            <ul class="mt-6 space-y-4">
              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
          <div class="p-6">
            <h2 class="text-lg font-medium leading-6 text-gray-900">Freelancer</h2>
            <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
            <p class="mt-8">
              <span class="text-4xl font-extrabold text-gray-900">$24</span>
              <span class="text-base font-medium text-gray-500">/mo</span>
            </p>
            <a href="#" class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700">Buy Freelancer</a>
          </div>
          <div class="px-6 pt-6 pb-8">
            <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
            <ul class="mt-6 space-y-4">
              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc. </span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Donec mauris sit in eu tincidunt etiam.</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
          <div class="p-6">
            <h2 class="text-lg font-medium leading-6 text-gray-900">Startup</h2>
            <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
            <p class="mt-8">
              <span class="text-4xl font-extrabold text-gray-900">$32</span>
              <span class="text-base font-medium text-gray-500">/mo</span>
            </p>
            <a href="#" class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700">Buy Startup</a>
          </div>
          <div class="px-6 pt-6 pb-8">
            <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
            <ul class="mt-6 space-y-4">
              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc. </span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Donec mauris sit in eu tincidunt etiam.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Faucibus volutpat magna.</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
          <div class="p-6">
            <h2 class="text-lg font-medium leading-6 text-gray-900">Enterprise</h2>
            <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
            <p class="mt-8">
              <span class="text-4xl font-extrabold text-gray-900">$48</span>
              <span class="text-base font-medium text-gray-500">/mo</span>
            </p>
            <a href="#" class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700">Buy Enterprise</a>
          </div>
          <div class="px-6 pt-6 pb-8">
            <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
            <ul class="mt-6 space-y-4">
              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc. </span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Donec mauris sit in eu tincidunt etiam.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Faucibus volutpat magna.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Id sed tellus in varius quisque.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Risus egestas faucibus.</span>
              </li>

              <li class="flex space-x-3">
                <!-- Heroicon name: solid/check -->
                <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm text-gray-500">Risus cursus ullamcorper.</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Feature list -->
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:py-24 lg:px-8">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-extrabold text-gray-900">All-in-one platform</h2>
        <p class="mt-4 text-lg text-gray-500">Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla nec.</p>
      </div>
      <dl class="mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">
        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">Invite team members</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Tempor tellus in aliquet eu et sit nulla tellus. Suspendisse est, molestie blandit quis ac. Lacus.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">Notifications</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Ornare donec rhoncus vitae nisl velit, neque, mauris dictum duis. Nibh urna non parturient.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">List view</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Etiam cras augue ornare pretium sit malesuada morbi orci, venenatis. Dictum lacus.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">Boards</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Interdum quam pulvinar turpis tortor, egestas quis diam amet, natoque. Mauris sagittis.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">Keyboard shortcuts</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Ullamcorper in ipsum ac feugiat. Senectus at aliquam vulputate mollis nec. In at risus odio.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">Reporting</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Magna a vel sagittis aliquam eu amet. Et lorem auctor quam nunc odio. Sed bibendum.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">Calendars</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Sed mi, dapibus turpis orci posuere integer. A porta viverra posuere adipiscing turpis.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <!-- Heroicon name: outline/check -->
            <svg class="absolute w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-medium leading-6 text-gray-900 ml-9">Mobile app</p>
          </dt>
          <dd class="flex mt-2 text-base text-gray-500 ml-9 lg:py-0 lg:pb-4">
            Quisque sapien nunc nisl eros. Facilisis sagittis maecenas id dignissim tristique proin sed.
          </dd>
        </div>
      </dl>
    </div>
  </div>

  <!-- Logo cloud on brand -->
  <div class="bg-purple-600">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:py-20 sm:px-6 lg:px-8">
      <div class="lg:space-y-10">
        <h2 class="text-3xl font-extrabold text-white">
          The world's most innovative companies use Workflow
        </h2>
        <div class="flow-root mt-8 lg:mt-0">
          <div class="flex flex-wrap justify-between -mt-4 -ml-8 lg:-ml-4">
            <div class="flex flex-grow flex-shrink-0 mt-4 ml-8 lg:flex-grow-0 lg:ml-4">
              <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-purple-200.svg" alt="Tuple">
            </div>
            <div class="flex flex-grow flex-shrink-0 mt-4 ml-8 lg:flex-grow-0 lg:ml-4">
              <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-purple-200.svg" alt="Mirage">
            </div>
            <div class="flex flex-grow flex-shrink-0 mt-4 ml-8 lg:flex-grow-0 lg:ml-4">
              <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-purple-200.svg" alt="StaticKit">
            </div>
            <div class="flex flex-grow flex-shrink-0 mt-4 ml-8 lg:flex-grow-0 lg:ml-4">
              <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-purple-200.svg" alt="Transistor">
            </div>
            <div class="flex flex-grow flex-shrink-0 mt-4 ml-8 lg:flex-grow-0 lg:ml-4">
              <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-purple-200.svg" alt="Workcation">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FAQ offset -->
  <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:py-20 lg:px-8">
    <div class="lg:grid lg:grid-cols-3 lg:gap-8">
      <div class="space-y-4">
        <h2 class="text-3xl font-extrabold text-gray-900">
          Frequently asked questions
        </h2>
        <p class="text-lg text-gray-500">Can’t find the answer you’re looking for? Reach out to our <a href="#" class="font-medium text-purple-600 hover:text-purple-500">customer support</a> team.</p>
      </div>
      <div class="mt-12 lg:mt-0 lg:col-span-2">
        <dl class="space-y-12">
          <div>
            <dt class="text-lg font-medium leading-6 text-gray-900">
              How do you make holy water?
            </dt>
            <dd class="mt-2 text-base text-gray-500">
              You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.
            </dd>
          </div>

          <div>
            <dt class="text-lg font-medium leading-6 text-gray-900">
              What&#039;s the best thing about Switzerland?
            </dt>
            <dd class="mt-2 text-base text-gray-500">
              I don&#039;t know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.
            </dd>
          </div>

          <div>
            <dt class="text-lg font-medium leading-6 text-gray-900">
              What do you call someone with no body and no nose?
            </dt>
            <dd class="mt-2 text-base text-gray-500">
              Nobody knows. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.
            </dd>
          </div>

          <div>
            <dt class="text-lg font-medium leading-6 text-gray-900">
              Why do you never see elephants hiding in trees?
            </dt>
            <dd class="mt-2 text-base text-gray-500">
              Because they&#039;re so good at it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>

  <!-- Footer 4-column with newsletter and localization dark -->
  <footer class="bg-gray-900">
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:py-16 lg:px-8">
      <h2 class="sr-only">Footer</h2>
      <div class="pb-8 xl:grid xl:grid-cols-5 xl:gap-8">
        <div class="grid grid-cols-2 gap-8 xl:col-span-4">
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                Solutions
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Marketing
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Analytics
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Commerce
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Insights
                  </a>
                </li>
              </ul>
            </div>
            <div class="mt-12 md:mt-0">
              <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                Support
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Pricing
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Documentation
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Guides
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    API Status
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                Company
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    About
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Jobs
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Press
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Partners
                  </a>
                </li>
              </ul>
            </div>
            <div class="mt-12 md:mt-0">
              <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                Legal
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Claim
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Privacy
                  </a>
                </li>
                <li>
                  <a href="#" class="text-base text-gray-300 hover:text-white">
                    Terms
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="mt-12 xl:mt-0">
          <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
            Language &amp; Currency
          </h3>
          <form class="mt-4 space-y-4 sm:max-w-xs">
            <fieldset class="w-full">
              <label for="language" class="sr-only">Language</label>
              <div class="relative">
                <select id="language" name="language" class="block w-full text-base text-white bg-gray-800 border border-transparent rounded-md bg-none focus:ring-white focus:border-white sm:text-sm">
                  <option selected>English</option>
                  <option>French</option>
                  <option>German</option>
                  <option>Japanese</option>
                  <option>Spanish</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                  <!-- Heroicon name: solid/chevron-down -->
                  <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </fieldset>
            <fieldset class="w-full">
              <label for="currency" class="sr-only">Currency</label>
              <div class="mt-1.5 relative">
                <select id="currency" name="currency" class="block w-full text-base text-white bg-gray-800 border border-transparent rounded-md bg-none focus:ring-white focus:border-white sm:text-sm">
                  <option>ARS</option>
                  <option selected>AUD</option>
                  <option>CAD</option>
                  <option>CHF</option>
                  <option>EUR</option>
                  <option>GBP</option>
                  <option>JPY</option>
                  <option>USD</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                  <!-- Heroicon name: solid/chevron-down -->
                  <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="pt-8 space-y-4 border-t border-gray-700 lg:space-y-0 lg:flex lg:items-center lg:justify-between xl:mt-0">
        <div class="space-y-2">
          <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
            Subscribe to our newsletter
          </h3>
          <p class="text-base text-gray-300">
            The latest news, articles, and resources, sent to your inbox weekly.
          </p>
        </div>
        <form class="sm:flex sm:max-w-md">
          <label for="emailAddress" class="sr-only">Email address</label>
          <input type="email" name="emailAddress" id="emailAddress" autocomplete="email" required class="w-full min-w-0 px-4 py-2 placeholder-gray-500 bg-white border border-transparent rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white sm:max-w-xs" placeholder="Enter your email">
          <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
            <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-purple-500">
              Subscribe
            </button>
          </div>
        </form>
      </div>
      <div class="pt-8 mt-8 border-t border-gray-700 md:flex md:items-center md:justify-between">
        <div class="flex space-x-6 md:order-2">
          <a href="#" class="text-gray-400 hover:text-gray-300">
            <span class="sr-only">Facebook</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-300">
            <span class="sr-only">Instagram</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-300">
            <span class="sr-only">Twitter</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-300">
            <span class="sr-only">GitHub</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-300">
            <span class="sr-only">Dribbble</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
        <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
          &copy; 2020 Workflow, Inc. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
</div>

</body>
</html>