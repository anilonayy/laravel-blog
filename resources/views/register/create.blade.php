<x-layout>
    <main class="mx-auto mt-10 lg:mt-20 space-y-6 max-w-md">
        <x-panel>
            <h1 class="text-center text-4xl font-extrabold"> Register </h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf


                <x-form.input name="username" />
                <x-form.input name="name"/>
                <x-form.input name="email" type="email"/>
                <x-form.input name="password" type="password"/>

                <a href="/login" class="mb-4 block text-blue-700 underline">I already have an account</a>

                <div class="mb-6">
                   <x-primary-button>Submit</x-primary-button>
                </div>
            </form>
        </x-panel>
    </main>
</x-layout>
