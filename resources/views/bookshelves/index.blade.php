<!DOCTYPE html>
<html>
<head>
    <title>Data Rak Buku</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f5f2;
            margin: 30px;
            color: #5c5470;
        }

        h1{
            color: #6d6875;
            margin-bottom: 20px;
        }

        .btn-tambah{
            display: inline-block;
            padding: 12px 20px;
            background-color: #a0c4b8;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-tambah:hover{
            background-color: #84a59d;
        }

        .btn-edit{
            padding: 8px 14px;
            background-color: #cdb4db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-right: 5px;
        }

        .btn-edit:hover{
            background-color: #b89ac9;
        }

        .btn-hapus{
            padding: 8px 14px;
            background-color: #e5989b;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-hapus:hover{
            background-color: #d67f83;
        }

        .aksi{
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        table th{
            background-color: #d8e2dc;
            padding: 15px;
        }

        table td{
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>

    <h1>Data Rak Buku</h1>

    <a href="{{ route('bookshelves.create') }}" class="btn-tambah">
        Tambah Rak
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Rak</th>
                <th>Nama Rak</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($bookshelves as $bookshelf)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bookshelf->code }}</td>
                <td>{{ $bookshelf->name }}</td>

                <td>
                    <div class="aksi">

                        <a href="{{ route('bookshelves.edit', $bookshelf->id) }}" class="btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('bookshelves.destroy', $bookshelf->id) }}"
                              method="POST"
                              class="form-hapus">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-hapus">
                                Hapus
                            </button>

                        </form>

                    </div>
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="4">
                    Data rak kosong
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        const formHapus = document.querySelectorAll('.form-hapus');

        formHapus.forEach(form => {

            form.addEventListener('submit', function(e){

                e.preventDefault();

                Swal.fire({
                    title: 'Yakin hapus rak?',
                    text: "Data tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e5989b',
                    cancelButtonColor: '#a0c4b8',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });

    </script>

</body>
</html>