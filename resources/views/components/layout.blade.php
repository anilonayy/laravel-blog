<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html{
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    @if (session()->has('success'))
        <div class="w-full bg-green-500 text-xl text-white text-center h-24 flex items-center justify-center"
        x-data="{ open: true }"
        x-show="open"
        x-init=" setTimeout(() => { open = false },5000)"
        >
            <p class="m-0"> {{ session('success') }} </p>
        </div>
    @elseif(session()->has('error')) {
        <div class="w-full bg-red-500 text-xl text-white text-center h-24 flex items-center justify-center"
        x-data="{ open: true }"
        x-show="open"
        x-init=" setTimeout(() => { open = false },5000)"
        >
            <p class="m-0"> {{ session('error') }} </p>
        </div>
    }
    @endif
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center justify-center gap-8">
                @auth

                <x-dropdown >
                    <x-slot name="trigger">
                        <span class="text-xs font-bold uppercase cursor-pointer">Welcome, {{ auth()->user()->name }} </span>
                    </x-slot>

                    <x-dropdown-item href="/bookmarks"> Bookmarks </x-dropdown-item>

                    @admin
                        <x-dropdown-item href="/admin/posts"> Posts </x-dropdown-item>
                        <x-dropdown-item href="/admin/posts/create"> New Post </x-dropdown-item>
                    @endadmin



                    <x-dropdown-item href="#">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" >Log Out</button>
                        </form>
                    </x-dropdown-item>

                </x-dropdown>


                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase">Log In</a>
                @endauth

                <a href="#newsletter"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletters" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="email" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">


                        </div>
                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>

                    </form>

                </div>

            </div>
            @error('email')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
        </footer>
    </section>


</body>
