<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10">

            <x-panel>

                <h1 class="text-center font-bold text-xl">Log In</h1>

                <form method="POST" action="/login" class="mt-10">

                    @csrf

                    {{-- Email --}}
                    <x-form.input name="email" type="email" autocomplete="username" required />

                    {{-- Password --}}
                    <x-form.input name="password" type="password" autocomplete="new-password" required />

                    {{-- Submit Button --}}
                    <div class="mb-6">
                        <x-form.button>Login</x-form.button>
                    </div>

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                </form>

            </x-panel>

        </main>

    </section>

</x-layout>
