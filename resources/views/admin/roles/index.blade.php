<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-4 m-2 p-2">
                {{-- <a href="{{ route('admin.roles.export') }}" onclick="event.preventDefault(); document.getElementById('export-form').submit();" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                    Export
                </a>
                <form id="export-form" action="{{ route('admin.roles.export') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('admin.roles.exportpdf') }}" onclick="event.preventDefault(); document.getElementById('export-form').submit();" class="px-4 py-2 bg-blue-600 hover:to-blue-500 rounded-lg text-white">
                    Export Pdf
                </a>
                <form id="export-form" action="{{ route('admin.roles.exportpdf') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('admin.roles.import') }}" id="import-form" onclick="event.preventDefault(); document.getElementById('file-input').click();" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                    Import
                </a>
                <form id="import-form" action="{{ route('admin.roles.import') }}" method="post" enctype="multipart/form-data" style="display: none;">
                    @csrf
                    <input type="file" name="file" id="file-input" onchange="document.getElementById('import-form').submit();">
                </form> --}}
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.roles.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New role</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Password
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Roles
                                        </th>
                                        <th scope="col" class="relative py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $role->name }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $role->email }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $role->password }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $role->role }}
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edit</a>
                                                    <form
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                        method="POST"
                                                        action="{{ route('admin.roles.destroy', $role->id) }}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Delete</button>   
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
