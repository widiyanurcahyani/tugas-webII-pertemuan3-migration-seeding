<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Kategori
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('categories.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Kategori
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">

                <table class="table-auto w-full border-collapse border border-gray-300">

                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Kategori</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($categories as $category)

                        <tr>
                            <td class="border p-2 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $category->name }}
                            </td>

                            <td class="border p-2 text-center">

                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-yellow-400 px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>

                                </form>

                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>