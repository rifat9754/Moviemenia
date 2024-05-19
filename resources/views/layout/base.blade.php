<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Homepage</title>
    <style>
        .active-category {
            background-color: #14b8a6; /* Teal-500 color */
            color: white;
        }
    </style>
</head>
<body>
    <div class="">
        <!-- Header -->
        <header class="text-slate-50 body-font bg-black">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row ">
                <a href="{{ route('home') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24" alt="Logo">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl text-white hover:text-blue-500">MOVIEMENIA</span>
                </a>

                <nav class=" contain absolute top-2 right-4 m-5 flex items-center text-1xl font-bold">
                <a href="{{ route('admin.login') }}" class="hover:text-blue-500 mr-4">Login as Admin</a>
                    <a href="{{ route('login') }}" class="hover:text-blue-500 mr-4">Log In</a>
                    <a href="{{ route('register') }}" class="hover:text-blue-500 mr-4">Sign Up</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
                    </form>
                </nav>
            </div>
        </header>

        <div class="py-5 items-center flex flex-col h-[100vh]">
            <div class="justify-center items-center flex flex-col sm:w-9/12">
                <ul class="justify-center items-center flex flex-wrap w-full gap-2">
                    @php
                        $new_category = DB::table('category1s')->get();
                    @endphp
                    @foreach($new_category as $item)
                        <li class="border border-gray-800 font-bold rounded-3xl px-4 py-1 hover:bg-teal-500 hover:text-white hover:shadow-lg text-[17px]" data-category-id="{{ $item->id }}">
                            <a href="{{ route('home', ['category' => $item->id]) }}" class="block w-full h-full">
                                {{$item->cat_name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Search Bar -->
            <div class="flex w-9/12 py-10">
                <form action="{{ route('home') }}" method="GET" enctype="multipart/form-data" class="w-full">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="query" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Movies......" required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>

            @section('contents')
            @show

        <!-- Footer -->
        <div class="">
            <footer class="text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
                    <a href="#" class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24" alt="Logo">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                        <span class="ml-3 text-xl">Moviemenia</span>
                    </a>
                    <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">@moviemenia--  
                        <a href="" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@tahmid</a>
                    </p>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                        <a href="#" class="text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-3 text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-3 text-gray-500">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-3 text-gray-500">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </span>
                </div>
            </footer>
        </div>
        @if (Auth::check())
        <div class="contain">
            <h1>Welcome, {{ Auth::user()->name }}</h1>
        </div>
    @endif
        </div>
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoryLinks = document.querySelectorAll('li[data-category-id]');
            
            categoryLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    categoryLinks.forEach(function (link) {
                        link.classList.remove('active-category');
                    });
                    link.classList.add('active-category');
                });
            });


            const urlParams = new URLSearchParams(window.location.search);
            const categoryId = urlParams.get('category');
            if (categoryId) {
                const activeLink = document.querySelector(`li[data-category-id="${categoryId}"]`);
                if (activeLink) {
                    activeLink.classList.add('active-category');
                }
            }
        });
    </script>
</body>
</html>
