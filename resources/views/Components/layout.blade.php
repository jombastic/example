<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite(["resources/css/app.css", "resources/js/app.js"])
        <title>Home page</title>
    </head>

    <body class="h-full">
        <div class="min-h-full">
            <nav class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <img
                                    class="size-8"
                                    src="https://laracasts.com/images/logo/logo-triangle.svg"
                                    alt="Your Company"
                                />
                            </div>
                            <div class="hidden md:block">
                                <div
                                    class="ml-10 flex items-baseline space-x-4"
                                >
                                    <x-nav-link
                                        :active="request()->is('/')"
                                        href="/"
                                    >
                                        Home
                                    </x-nav-link>
                                    <x-nav-link
                                        :active="request()->is('jobs')"
                                        href="/jobs"
                                    >
                                        Jobs
                                    </x-nav-link>
                                    <x-nav-link
                                        :active="request()->is('contact')"
                                        href="/contact"
                                    >
                                        Contact
                                    </x-nav-link>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                @guest
                                    <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                                    <x-nav-link class="ml-3" href="/register" :active="request()->is('register')">Register</x-nav-link>
                                @endguest
                                @auth
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <x-form-button>Log Out</x-form-button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            <!-- Mobile menu button -->
                            <button
                                type="button"
                                class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                aria-controls="mobile-menu"
                                aria-expanded="false"
                            >
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                <!-- Menu open: "hidden", Menu closed: "block" -->
                                <svg
                                    class="block size-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                    data-slot="icon"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                    />
                                </svg>
                                <!-- Menu open: "block", Menu closed: "hidden" -->
                                <svg
                                    class="hidden size-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                    data-slot="icon"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6 18 18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="md:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link
                            :active="request()->is('/')"
                            href="/"
                            class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                            aria-current="page"
                        >
                            Home
                        </x-nav-link>
                        <x-nav-link
                            :active="request()->is('jobs')"
                            href="/jobs"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                        >
                            Jobs
                        </x-nav-link>
                        <x-nav-link
                            :active="request()->is('contact')"
                            href="/contact"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                        >
                            Contact
                        </x-nav-link>
                    </div>
                    <div class="border-t border-gray-700 pb-3 pt-4">
                        <div class="flex items-center px-5">
                            <div class="shrink-0">
                                <img
                                    class="size-10 rounded-full"
                                    src="https://laracasts.com/images/lary-ai-face.svg"
                                    alt=""
                                />
                            </div>
                            <div class="ml-3">
                                <div class="text-base/5 font-medium text-white">
                                    Lary Robot
                                </div>
                                <div class="text-sm font-medium text-gray-400">
                                    lary@robot.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="bg-white shadow">
                <div
                    class="mx-auto max-w-7xl px-4 py-6 sm:flex sm:justify-between sm:px-6 lg:px-8"
                >
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                        {{ $heading }}
                    </h1>

                    <x-button href="/jobs/create">Create Job</x-button>
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
