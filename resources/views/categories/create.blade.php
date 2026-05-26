<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kategori
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('categories.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label>Nama Kategori</label>

                        <input type="text"
                            name="name"
                            class="border rounded w-full">
                    </div>

                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">

                        Simpan
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>