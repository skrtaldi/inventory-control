<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Your Title Here</title>
    <style>
        .navbar-text {
            margin-right: 20px;
            /* Sesuaikan jumlah margin sesuai kebutuhan */
        }

        /* Added CSS for hover effect with delay */
        .navbar-nav .nav-item {
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-item:hover {
            background-color: #ffffff; /* Change the color as needed */
            transition-delay: 0.2s; /* Adjust the delay time as needed */
            border-radius: 20px;
        }

        .navbar-nav .nav-item:hover a {
            color: #000000 !important; /* Change the color as needed */
            transition-delay: 0.2s; /* Adjust the delay time as needed */
        }
    </style>
</head>

<body>

    <!-- Laravel Blade Code -->
    <nav x-data="{ open: false }" class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #64c9f5;">
        <div class="container-fluid">
            <!-- Navbar Brand -->
            <a class="navbar-brand px-3 text-white" href="#">
                <img src="{{ asset('images/Logo Super.png') }}" alt="Logo" width="40" height="40"
            class="navbar-brand" style="font-size: 24px;">Sumber Rahayu</a>
            <!-- Navbar Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class=" navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" style="font-size: 20px; padding: 0 10px;" href="{{ route('dashboard') }}">
                            Dashboard
                           <span class="badge badge-center rounded-pill bg-danger">
                            {{ $lowStockCount }}
                           </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 20px; padding: 0 10px;" href="{{ route('barang') }}">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 20px; padding: 0 10px;" href="{{ route('admin') }}">Inventaris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 20px; padding: 0 10px;" href="{{ route('customer') }}">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 20px; padding: 0 10px;" href="{{ route('supplier') }}">Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 20px; padding: 0 10px;" href="{{ route('user') }}">User Control</a>
                    </li>
                </ul>
            </div>

            <!-- User Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>