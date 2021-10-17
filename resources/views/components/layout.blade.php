<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">

    <section class="px-6 py-8">

        {{-- Navbar --}}
        <nav class="md:flex md:justify-between md:items-center">

            {{-- LHS: Home Page Link --}}
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            {{-- RHS: Navigation --}}
            <div class="mt-8 md:mt-0 flex items-center">

                {{-- User's Name --}}
                @auth<span class="text-xs font-bold uppercase">{{ auth()->user()->name }}</span>@endauth

                {{-- Subscribe --}}
                <a href="#newsletter" class="bg-green-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Subscribe</a>

                @auth

                    {{-- Logout Button --}}
                    <form action="/logout" method="POST">
                        @csrf
                        <div class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                            <button type="submit" class="text-xs font-semibold text-white uppercase">
                                Log Out
                            </button>
                        </div>
                    </form>

                @else

                    {{-- Register --}}
                    <a href="/register" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Register
                    </a>

                    {{-- Login --}}
                    <a href="/login" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Login
                    </a>

                @endauth

            </div>

        </nav>

        {{ $slot }}

        {{-- Footer --}}
        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">

            {{-- Icon --}}
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">

            {{-- Heading --}}
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            {{-- Subscribe --}}
            <div class="mt-10">

                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    {{-- Form --}}
                    <form method="POST" action="/newsletter" class="lg:flex text-sm">

                        @csrf

                        {{-- Email Address --}}
                        <div class="lg:py-3 lg:px-5 flex items-center">

                            {{-- Mail Icon --}}
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>

                                {{-- Text Input --}}
                                <input id="email" name="email" type="email" placeholder="Your email address" required class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                {{-- Error Messages --}}
                                @error('email')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
        
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>

                    </form>

                </div>

            </div>

        </footer>

    </section>

    {{-- Flash Message --}}
    <x-flash />

</body>
