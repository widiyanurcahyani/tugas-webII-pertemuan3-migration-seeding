<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f5f2;
            margin: 30px;
            color: #5c5470;
        }

        .card{
            max-width: 700px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        h1{
            text-align: center;
            color: #6d6875;
            margin-bottom: 30px;
        }

        .cover{
            text-align: center;
            margin-bottom: 25px;
        }

        .cover img{
            width: 200px;
            border-radius: 15px;
        }

        .item{
            margin-bottom: 18px;
        }

        .label{
            font-weight: bold;
            color: #6d6875;
        }

        .value{
            margin-top: 5px;
        }

        .btn-kembali{
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #a0c4b8;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        .btn-kembali:hover{
            background-color: #84a59d;
        }

    </style>

</head>
<body>

    <div class="card">

        <h1>Detail Buku</h1>

        <div class="cover">
            <img src="{{ asset('cover/'.$book->cover) }}">
        </div>

        <div class="item">
            <div class="label">Judul Buku</div>
            <div class="value">{{ $book->title }}</div>
        </div>

        <div class="item">
            <div class="label">Author</div>
            <div class="value">{{ $book->author }}</div>
        </div>

        <div class="item">
            <div class="label">Tahun Publish</div>
            <div class="value">{{ $book->year_publish }}</div>
        </div>

        <div class="item">
            <div class="label">Penerbit</div>
            <div class="value">{{ $book->publisher }}</div>
        </div>

        <div class="item">
            <div class="label">Kota</div>
            <div class="value">{{ $book->city }}</div>
        </div>

        <div class="item">
            <div class="label">Rak Buku</div>
            <div class="value">{{ $book->bookshelf->name }}</div>
        </div>

        <a href="{{ route('books.index') }}" class="btn-kembali">
            ← Kembali
        </a>

    </div>

</body>
</html>