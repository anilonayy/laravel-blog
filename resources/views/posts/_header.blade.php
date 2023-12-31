<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="gap-3 lg:flex lg:inline-flex lg:items-center">
            <x-category-dropdown />
            <x-author-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/?{{ request()->getQueryString() }}">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <input type="text" name="search" placeholder="Find something" value="{{ request('search') }}"
                    class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>
