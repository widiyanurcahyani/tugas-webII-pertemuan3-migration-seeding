<!DOCTYPE html>
<html>
<head>
    <title>Tambah Rak Buku</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f5f2;
            margin: 30px;
            color: #5c5470;
        }

        .container{
            width: 500px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        h1{
            text-align: center;
            margin-bottom: 25px;
            color: #6d6875;
        }

        label{
            display: block;
            margin-top: 15px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input{
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .btn-submit{
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background-color: #a0c4b8;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 25px;
        }

        .btn-kembali{
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #6d6875;
        }
    </style>
</head>
<body>

    <div class="container">

        <h1>Tambah Rak Buku</h1>

        <form action="{{ route('bookshelves.store') }}" method="POST">

            @csrf

            <label>Kode Rak</label>
            <input type="text" name="code">

            <label>Nama Rak</label>
            <input type="text" name="name">

            <button type="submit" class="btn-submit">
                Simpan
            </button>

        </form>

        <a href="{{ route('bookshelves.index') }}" class="btn-kembali">
            ← Kembali
        </a>

    </div>

</body>
</html>