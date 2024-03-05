<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recent Transactions') }}
        </h2>
        <p class="text-gray-700 dark:text-gray-300">
            These are details about the last transactions
        </p>
    </x-slot>

    <div class="mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">
        <!-- Search Bar -->
        <div class="flex w-full gap-2 shrink-0 md:w-max">
            <!-- ... Your existing search bar code ... -->
        </div>

        <!-- Export and Import Buttons -->
        <div class="flex space-x-4 m-2 p-2">
            <a href="{{ route('admin.categories.export') }}"
                onclick="event.preventDefault(); document.getElementById('export-form').submit();"
                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                Export Excel
            </a>
            <form id="export-form" action="{{ route('admin.categories.export') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('admin.categories.exportpdf') }}"
                class="px-4 py-2 bg-blue-600 hover:to-blue-500 rounded-lg text-white">
                Export Pdf
            </a>
            <form action="{{ route('admin.categories.exportpdf') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('admin.categories.import') }}"
                onclick="event.preventDefault(); document.getElementById('file-input').click();"
                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                Import
            </a>
            <form id="import-form" action="{{ route('admin.categories.import') }}" method="post"
                enctype="multipart/form-data" style="display: none;">
                @csrf
                <input type="file" name="file" id="file-input"
                    onchange="document.getElementById('import-form').submit();">
            </form>
        </div>
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.categories.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Categories</a>
        </div>
        <!-- Table -->
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Name
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Image
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Description
                                </th>
                                <th scope="col" class="relative py-3 px-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <!-- Table Body -->
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->name }}
                                </td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ Storage::url($category->image) }}" class="w-16 h-16 rounded">
                                </td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->description }}
                                </td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                            method="POST"
                                            action="{{ route('admin.categories.destroy', $category->id) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            </tr>

                        </tbody>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination Section -->
        <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
            @if ($categories->total() > 0)
                <div class="flex-1 flex justify-between sm:hidden">
                    <!-- Tombol-tombol navigasi pagination untuk tampilan layar kecil -->
                    {{ $categories->links('pagination::tailwind') }}
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <!-- Informasi halaman saat ini dan navigasi pagination -->
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300 leading-5">
                            Showing
                            <span class="font-medium">{{ $categories->firstItem() }}</span>
                            to
                            <span class="font-medium">{{ $categories->lastItem() }}</span>
                            of
                            <span class="font-medium">{{ $categories->total() }}</span>
                            results
                        </p>
                    </div>
                    <div class="flex items-center">
                        <!-- Tampilkan nomor halaman secara eksplisit -->
                        @foreach ($categories as $category)
                            <a href="{{ $category->url }}"
                                class="px-3 py-1 mx-1 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white">{{ $category->page }}</a>
                        @endforeach
                    </div>
                    <div>
                        <!-- Tombol navigasi pagination untuk tampilan besar -->
                        {{ $categories->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif
        </div>

    </div>
</x-admin-layout>

