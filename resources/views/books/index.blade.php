<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Buku
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between mb-4">
                    <form action="{{ route('books.index') }}" method="GET">
                        <input type="text" name="search"
                            placeholder="Cari buku..."
                            class="border rounded px-3 py-2">
                    </form>

                    <a href="{{ route('books.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded">
                        + Tambah Buku
                    </a>
                </div>

                <table class="table-auto w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Cover</th>
                            <th class="border px-4 py-2">Judul</th>
                            <th class="border px-4 py-2">Author</th>
                            <th class="border px-4 py-2">Publisher</th>
                            <th class="border px-4 py-2">Rak</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($books as $book)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border px-4 py-2">
                                    <img src="{{ asset('cover/' . $book->cover) }}"
                                        width="70">
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $book->title }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $book->author }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $book->publisher }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $book->bookshelf->name ?? '-' }}
                                </td>

                                <td class="border px-4 py-2 flex gap-2">
                                    <a href="{{ route('books.show', $book->id) }}"
                                        class="bg-green-500 text-white px-3 py-1 rounded">
                                        Detail
                                    </a>

                                    <a href="{{ route('books.edit', $book->id) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('books.destroy', $book->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-500 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-4">
                                    Data buku kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $books->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>