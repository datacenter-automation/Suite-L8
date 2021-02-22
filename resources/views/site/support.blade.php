<!DOCTYPE html>
<html lang="en">
<head>
  <title>Datacenter Automation Suite&trade;</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="min-h-screen bg-white">
  <header class="relative pb-36 bg-blue-gray-800">
    <div class="absolute inset-0">
      <img class="object-cover w-full h-full"
           src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixqx=hFcIz7dS9K&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&&sat=-100"
           alt="">
      <div class="absolute inset-0 bg-blue-gray-800" style="mix-blend-mode: multiply;" aria-hidden="true"></div>
    </div>
    <div class="relative z-10">
      <nav class="relative flex items-center justify-between px-4 pt-6 pb-2 mx-auto max-w-7xl sm:px-6 lg:px-8"
           aria-label="Global">
        <div class="flex items-center flex-1">
          <div class="flex items-center justify-between w-full lg:w-auto">
            <a href="#">
              <span class="sr-only">Workflow</span>
              <img class="w-auto h-8 sm:h-10"
                   src="https://tailwindui.com/img/logos/workflow-mark.svg?color=blue&shade=500" alt="">
            </a>
            <div class="flex items-center -mr-2 lg:hidden">
              <button type="button"
                      class="inline-flex items-center justify-center p-2 text-white bg-opacity-0 rounded-md bg-blue-gray-900 hover:bg-opacity-100 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white"
                      aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
              </button>
            </div>
          </div>
          <div class="hidden space-x-10 lg:flex lg:ml-10">
            <a href="#" class="text-base font-medium text-white hover:text-blue-100">Changelog</a>

            <a href="#" class="text-base font-medium text-white hover:text-blue-100">About</a>

            <a href="#" class="text-base font-medium text-white hover:text-blue-100">Partners</a>

            <a href="#" class="text-base font-medium text-white hover:text-blue-100">News</a>
          </div>
        </div>
        <div class="hidden lg:flex lg:items-center lg:space-x-6">
          <a href="#"
             class="px-6 py-2 text-base font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-md hover:bg-blue-600">
            Login
          </a>
        </div>
      </nav>

      <!--
        Mobile menu, show/hide based on menu open state.

        Entering: "duration-150 ease-out"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "duration-100 ease-in"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->
      <div class="absolute inset-x-0 top-0 p-2 transition origin-top transform lg:hidden">
        <div class="overflow-hidden bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
          <div class="flex items-center justify-between px-5 pt-4">
            <div>
              <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=blue&shade=500"
                   alt="">
            </div>
            <div class="-mr-2">
              <button type="button"
                      class="inline-flex items-center justify-center p-2 bg-white rounded-md text-blue-gray-400 hover:bg-blue-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </button>
            </div>
          </div>
          <div class="pt-5 pb-6">
            <div class="px-2 space-y-1">
              <a href="#"
                 class="block px-3 py-2 text-base font-medium rounded-md text-blue-gray-900 hover:bg-blue-gray-50">Changelog</a>

              <a href="#"
                 class="block px-3 py-2 text-base font-medium rounded-md text-blue-gray-900 hover:bg-blue-gray-50">About</a>

              <a href="#"
                 class="block px-3 py-2 text-base font-medium rounded-md text-blue-gray-900 hover:bg-blue-gray-50">Partners</a>

              <a href="#"
                 class="block px-3 py-2 text-base font-medium rounded-md text-blue-gray-900 hover:bg-blue-gray-50">News</a>
            </div>
            <div class="px-5 mt-6">
              <a href="#"
                 class="block w-full px-4 py-2 font-medium text-center text-white bg-blue-500 border border-transparent rounded-md shadow hover:bg-blue-600">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="relative max-w-md px-4 pb-32 mx-auto mt-24 sm:max-w-3xl sm:px-6 md:mt-32 lg:max-w-7xl lg:px-8">
      <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Support</h1>
      <p class="max-w-3xl mt-6 text-xl text-blue-gray-300">Varius facilisi mauris sed sit. Non sed et duis dui leo,
        vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames. Dui, amet, nec sit
        pulvinar.</p>
    </div>
  </header>

  <main>
    <div class="bg-blue-gray-50">
      <!-- Cards -->
      <section class="relative z-10 max-w-md px-4 mx-auto -mt-32 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8"
               aria-labelledby="contact-heading">
        <h2 class="sr-only" id="contact-heading">Contact us</h2>
        <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">
          <div class="bg-white shadow-xl rounded-2xl">
            <div class="relative px-6 pt-16 pb-8 md:px-8">
              <div class="absolute top-0 inline-block p-5 transform -translate-y-1/2 bg-blue-600 shadow-lg rounded-xl">
                <!-- Heroicon name: outline/phone -->
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
              </div>
              <h3 class="text-xl font-medium text-blue-gray-900">Sales</h3>
              <p class="mt-4 text-base text-blue-gray-500">Varius facilisi mauris sed sit. Non sed et duis dui leo,
                vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames.</p>
            </div>
            <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
              <a href="#" class="text-base font-medium text-blue-700 hover:text-blue-600">Contact us<span
                  aria-hidden="true"> &rarr;</span></a>
            </div>
          </div>

          <div class="bg-white shadow-xl rounded-2xl">
            <div class="relative px-6 pt-16 pb-8 md:px-8">
              <div class="absolute top-0 inline-block p-5 transform -translate-y-1/2 bg-blue-600 shadow-lg rounded-xl">
                <!-- Heroicon name: outline/support -->
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              </div>
              <h3 class="text-xl font-medium text-blue-gray-900">Technical Support</h3>
              <p class="mt-4 text-base text-blue-gray-500">Varius facilisi mauris sed sit. Non sed et duis dui leo,
                vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames.</p>
            </div>
            <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
              <a href="#" class="text-base font-medium text-blue-700 hover:text-blue-600">Contact us<span
                  aria-hidden="true"> &rarr;</span></a>
            </div>
          </div>

          <div class="bg-white shadow-xl rounded-2xl">
            <div class="relative px-6 pt-16 pb-8 md:px-8">
              <div class="absolute top-0 inline-block p-5 transform -translate-y-1/2 bg-blue-600 shadow-lg rounded-xl">
                <!-- Heroicon name: outline/newspaper -->
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
              </div>
              <h3 class="text-xl font-medium text-blue-gray-900">Media Inquiries</h3>
              <p class="mt-4 text-base text-blue-gray-500">Varius facilisi mauris sed sit. Non sed et duis dui leo,
                vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames.</p>
            </div>
            <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
              <a href="#" class="text-base font-medium text-blue-700 hover:text-blue-600">Contact us<span
                  aria-hidden="true"> &rarr;</span></a>
            </div>
          </div>
        </div>
      </section>

      <!-- FAQ -->
      <section
        class="max-w-md px-4 py-24 mx-auto divide-y-2 divide-blue-gray-200 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:py-32 lg:px-8"
        aria-labelledby="faq-heading">
        <h2 class="text-3xl font-extrabold text-blue-gray-900" id="faq-heading">
          Frequently asked questions
        </h2>
        <div class="pt-10 mt-6">
          <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:grid-rows-2 md:gap-x-8 md:gap-y-12">
            <div>
              <dt class="text-lg font-medium text-blue-gray-900">
                What&#039;s the best thing about Switzerland?
              </dt>
              <dd class="mt-2 text-base text-blue-gray-500">
                I don&#039;t know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quas cupiditate laboriosam fugiat.
              </dd>
            </div>

            <div>
              <dt class="text-lg font-medium text-blue-gray-900">
                Why do you never see elephants hiding in trees?
              </dt>
              <dd class="mt-2 text-base text-blue-gray-500">
                Because they&#039;re so good at it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                cupiditate laboriosam fugiat.
              </dd>
            </div>

            <div>
              <dt class="text-lg font-medium text-blue-gray-900">
                How do you make holy water?
              </dt>
              <dd class="mt-2 text-base text-blue-gray-500">
                You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate
                laboriosam fugiat.
              </dd>
            </div>

            <div>
              <dt class="text-lg font-medium text-blue-gray-900">
                Why can&#039;t you hear a pterodactyl go to the bathroom?
              </dt>
              <dd class="mt-2 text-base text-blue-gray-500">
                Because the pee is silent. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate
                laboriosam fugiat.
              </dd>
            </div>

            <div>
              <dt class="text-lg font-medium text-blue-gray-900">
                What do you call someone with no body and no nose?
              </dt>
              <dd class="mt-2 text-base text-blue-gray-500">
                Nobody knows. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam
                fugiat.
              </dd>
            </div>

            <div>
              <dt class="text-lg font-medium text-blue-gray-900">
                Why did the invisible man turn down the job offer?
              </dt>
              <dd class="mt-2 text-base text-blue-gray-500">
                He couldn&#039;t see himself doing it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                cupiditate laboriosam fugiat.
              </dd>
            </div>
          </dl>
        </div>
      </section>
    </div>

    <!-- CTA Section -->
    <section class="relative bg-white" aria-labelledby="join-heading">
      <div class="absolute inset-x-0 hidden h-1/2 bg-blue-gray-50 lg:block" aria-hidden="true"></div>
      <div class="mx-auto bg-blue-600 max-w-7xl lg:bg-transparent lg:px-8">
        <div class="lg:grid lg:grid-cols-12">
          <div class="relative z-10 lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent">
            <div class="absolute inset-x-0 h-1/2 bg-blue-gray-50 lg:hidden" aria-hidden="true"></div>
            <div class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0">
              <div class="aspect-w-10 aspect-h-6 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1">
                <img class="object-cover object-center shadow-2xl rounded-3xl"
                     src="https://images.unsplash.com/photo-1507207611509-ec012433ff52?ixlib=rb-1.2.1&ixqx=hFcIz7dS9K&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80"
                     alt="">
              </div>
            </div>
          </div>

          <div
            class="relative bg-blue-600 lg:col-start-3 lg:row-start-1 lg:col-span-10 lg:rounded-3xl lg:grid lg:grid-cols-10 lg:items-center">
            <div class="absolute inset-0 hidden overflow-hidden rounded-3xl lg:block" aria-hidden="true">
              <svg
                class="absolute transform bottom-full left-full translate-y-1/3 -translate-x-2/3 xl:bottom-auto xl:top-0 xl:translate-y-0"
                width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                <defs>
                  <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20"
                           patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-blue-500" fill="currentColor"/>
                  </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
              </svg>
              <svg class="absolute transform top-full -translate-y-1/3 -translate-x-1/3 xl:-translate-y-1/2" width="404"
                   height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                <defs>
                  <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20"
                           patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-blue-500" fill="currentColor"/>
                  </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
              </svg>
            </div>
            <div
              class="relative max-w-md px-4 py-12 mx-auto space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-4 lg:col-span-6">
              <h2 class="text-3xl font-extrabold text-white" id="join-heading">Join our team</h2>
              <p class="text-lg text-white">Varius facilisi mauris sed sit. Non sed et duis dui leo, vulputate id
                malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames.</p>
              <a
                class="block w-full px-5 py-3 text-base font-medium text-center text-blue-700 bg-white border border-transparent rounded-md shadow-md hover:bg-blue-gray-50 sm:inline-block sm:w-auto"
                href="#">Explore open positions</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Newsletter Section -->
    <section
      class="max-w-md px-4 py-24 mx-auto sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:py-32 lg:px-8 lg:flex lg:items-center"
      aria-labelledby="newsletter-heading">
      <div class="lg:w-0 lg:flex-1">
        <h2 class="text-3xl font-extrabold text-blue-gray-900 sm:text-4xl" id="newsletter-heading">
          Sign up for our newsletter
        </h2>
        <p class="max-w-3xl mt-3 text-lg text-blue-gray-500">
          Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui Lorem cupidatat commodo. Elit sunt amet
          fugiat veniam occaecat fugiat.
        </p>
      </div>
      <div class="mt-8 lg:mt-0 lg:ml-8">
        <form class="sm:flex">
          <label for="emailAddress" class="sr-only">Email address</label>
          <input id="emailAddress" name="emailAddress" type="email" autocomplete="email" required
                 class="w-full px-5 py-3 border rounded-md shadow-sm border-blue-gray-300 placeholder-blue-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs"
                 placeholder="Enter your email">
          <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
            <button type="submit"
                    class="flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
              Notify me
            </button>
          </div>
        </form>
        <p class="mt-3 text-sm text-blue-gray-500">
          We care about the protection of your data. Read our
          <a href="#" class="font-medium underline">
            Privacy Policy.
          </a>
        </p>
      </div>
    </section>
  </main>

  <footer class="bg-blue-gray-50" aria-labelledby="footerHeading">
    <h2 id="footerHeading" class="sr-only">Footer</h2>
    <div class="max-w-md px-4 py-12 mx-auto sm:max-w-7xl sm:px-6 lg:py-16 lg:px-8">
      <div class="xl:grid xl:grid-cols-3 xl:gap-8">
        <div class="space-y-8 xl:col-span-1">
          <img class="h-10" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=blueGray&shade=300"
               alt="Company name">
          <p class="text-base text-blue-gray-500">
            Making the world a better place through constructing elegant hierarchies.
          </p>
          <div class="flex space-x-6">
            <a href="#" class="text-blue-gray-400 hover:text-blue-gray-500">
              <span class="sr-only">Facebook</span>
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                      clip-rule="evenodd"/>
              </svg>
            </a>

            <a href="#" class="text-blue-gray-400 hover:text-blue-gray-500">
              <span class="sr-only">Instagram</span>
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                      clip-rule="evenodd"/>
              </svg>
            </a>

            <a href="#" class="text-blue-gray-400 hover:text-blue-gray-500">
              <span class="sr-only">Twitter</span>
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path
                  d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
              </svg>
            </a>

            <a href="#" class="text-blue-gray-400 hover:text-blue-gray-500">
              <span class="sr-only">GitHub</span>
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                      clip-rule="evenodd"/>
              </svg>
            </a>

            <a href="#" class="text-blue-gray-400 hover:text-blue-gray-500">
              <span class="sr-only">Dribbble</span>
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                      clip-rule="evenodd"/>
              </svg>
            </a>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-8 mt-12 xl:mt-0 xl:col-span-2">
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-semibold tracking-wider uppercase text-blue-gray-400">
                Solutions
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Marketing
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Analytics
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Commerce
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Insights
                  </a>
                </li>
              </ul>
            </div>
            <div class="mt-12 md:mt-0">
              <h3 class="text-sm font-semibold tracking-wider uppercase text-blue-gray-400">
                Support
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Pricing
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Documentation
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Guides
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    API Status
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-semibold tracking-wider uppercase text-blue-gray-400">
                Company
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    About
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Blog
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Jobs
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Press
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Partners
                  </a>
                </li>
              </ul>
            </div>
            <div class="mt-12 md:mt-0">
              <h3 class="text-sm font-semibold tracking-wider uppercase text-blue-gray-400">
                Legal
              </h3>
              <ul class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Claim
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Privacy
                  </a>
                </li>

                <li>
                  <a href="#" class="text-base text-blue-gray-500 hover:text-blue-gray-900">
                    Terms
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="pt-8 mt-12 border-t border-blue-gray-200">
        <p class="text-base text-blue-gray-400 xl:text-center">
          &copy; 2020 Workflow, Inc. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
