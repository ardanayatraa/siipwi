<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>



        @livewireStyles
    </head>

    <body class="font-sans antialiased">

        <nav class="fixed top-0 z-10 w-full shadow-md bg-white border-b border-gray-200 ">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="#" class="flex ms-2">
                            <img src="/assets/img/logo.png" class="h-12 " alt="SippWifi Logo" />
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div class="flex items-center gap-7 space-x-2">
                                <!-- Additional Button on the Left -->
                                <div class="relative flex items-center group">
                                    <!-- Tooltip Text -->
                                    <span
                                        class="absolute left-[-110%] bottom-1/2 transform -translate-x-1/2 translate-y-1/2 px-2 py-1 text-xs text-white bg-purple-700 rounded whitespace-nowrap overflow-hidden opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        Riwayat Transaksi
                                    </span>

                                    <!-- Button -->
                                    <a href="{{ route('order.index') }}"
                                        class="flex items-center justify-center w-12 h-12 rounded-full text-black bg-white ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                        </svg>
                                    </a>
                                </div>

                                <!-- Profile Button -->
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open" type="button"
                                        class="flex items-center text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 ">
                                        <span class="sr-only">Open user menu</span>
                                        @php
                                            function getInitials($name)
                                            {
                                                $names = explode(' ', $name);
                                                $initials = '';

                                                if (count($names) > 1) {
                                                    $initials = strtoupper($names[0][0] . $names[count($names) - 1][0]);
                                                } else {
                                                    $initials = strtoupper($name[0] . $name[-1]);
                                                }

                                                return $initials;
                                            }

                                            $user = auth()->user();
                                            $userName = $user->name;
                                            $userInitials = getInitials($userName);
                                            $userPhoto = $user->photo ?? null;
                                        @endphp

                                        @if ($userPhoto)
                                            <img class="w-12 h-12 rounded-full border-2 border-purple-500 shadow-lg"
                                                src="{{ $userPhoto }}" alt="user photo">
                                        @else
                                            <div
                                                class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-purple-500 font-bold border-2 border-purple-500 shadow-lg">
                                                {{ $userInitials }}
                                            </div>
                                        @endif
                                    </button>

                                    <!-- Dropdown -->
                                    <div x-show="open" @click.outside="open = false"
                                        class="absolute right-0 z-50 mt-2 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow "
                                        style="display: none;">
                                        <div class="px-4 py-3">
                                            <p class="text-sm text-gray-900">
                                                {{ auth()->user()->name }}
                                            </p>
                                            <p class="text-sm font-medium text-gray-900 truncate ">
                                                {{ auth()->user()->email }}
                                            </p>
                                        </div>
                                        <ul class="py-1">
                                            <li>
                                                <x-dropdown-link href="{{ route('dashboard') }}">
                                                    {{ __('Dashboard') }}
                                                </x-dropdown-link>
                                            </li>
                                            <li>
                                                <x-dropdown-link href="{{ route('profile.show') }}">
                                                    {{ __('Profile') }}
                                                </x-dropdown-link>
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf
                                                    <x-dropdown-link href="{{ route('logout') }}"
                                                        @click.prevent="$root.submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <aside id="logo-sidebar"
            class="fixed top-0 left-0  shadow-lg z-50 w-64 h-screen transition-transform transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "
            aria-label="Sidebar">
            <div class="h-full text-center px-3 pb-4 overflow-y-auto bg-white ">
                <a href="#" class="flex justify-center items-center pt-8">
                    <h2 class="text-lg font-semibold text-gray-900 "> <img src="/assets/img/logo.png" class="h-20 "
                            alt="SippWifi Logo" /></h2>
                </a>
                <ul class="space-y-2 pt-8 font-medium">

                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1  {{ request()->routeIs('dashboard*') ? 'bg-purple-600 ' : '' }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                            href="{{ route('dashboard') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3  ">
                        <span
                            class="absolute inset-y-0 left-0 w-1  {{ request()->routeIs('order*') ? 'bg-purple-600 ' : '' }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('order.index') }}">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>


                            <span class="ml-4">Order</span>
                        </a>
                    </li>

                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1  {{ request()->routeIs('product*') ? 'bg-purple-600' : '' }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('product.index') }}">


                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>

                            <span class="ml-4">Product</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1  {{ request()->routeIs('provider*') ? 'bg-purple-600' : '' }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('provider.index') }}">


                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>

                            <span class="ml-4">Provider</span>
                        </a>
                    </li>

                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1  {{ request()->routeIs('stock*') ? 'bg-purple-600' : '' }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('stock.index') }}">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>



                            <span class="ml-4">Stock</span>
                        </a>
                    </li>

                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1  {{ request()->routeIs('category*') ? 'bg-purple-600' : '' }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('category.index') }}">


                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>

                            <span class="ml-4">Kategori</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1  {{ request()->routeIs('laporan*') ? 'bg-purple-600' : '' }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
                            href="{{ route('laporan.index') }}">

                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span cl <span class="ml-4">Laporan</span>
                        </a>
                    </li>





                </ul>
            </div>
        </aside>


        <div class="p-4 mt-14 sm:ml-64">
            <div class="fixed bg-purple-500 h-96 w-full top-0 left-0 z-[-10]">
                <!-- Your content here -->
            </div>


            <!-- Page Content -->
            <main>

                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden p-8 border sm:rounded-lg">
                            {{ $slot }}
                        </div>
                    </div>
                </div>

            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        @stack('modals')

        @livewireScripts

        <x-toaster-hub />
    </body>

</html>
