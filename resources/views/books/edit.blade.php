<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f5f2;
            margin: 30px;
            color: #5c5470;
        }

        .container{
            width: 600px;
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

        .error-box{
            background-color: #ffe5e5;
            color: #d62828;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error-box ul{
            margin: 0;
            padding-left: 20px;
        }

        label{
            display: block;
            margin-top: 15px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select{
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
        }

        img{
            margin-top: 10px;
            border-radius: 10px;
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
            transition: 0.3s;
        }

        .btn-submit:hover{
            background-color: #84a59d;
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

        <h1>Edit Buku</h1>

        @if ($errors->any())

            <div class="error-box">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('books.update', $book->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label>Judul Buku</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $book->title) }}">

            <label>Author</label>
            <input type="text"
                   name="author"
                   value="{{ old('author', $book->author) }}">

            <label>Tahun Terbit</label>
            <input type="number"
                   name="year_publish"
                   value="{{ old('year_publish', $book->year_publish) }}">

            <label>Penerbit</label>
            <input type="text"
                   name="publisher"
                   value="{{ old('publisher', $book->publisher) }}">

            <label>Kota</label>
            <input type="text"
                   name="city"
                   value="{{ old('city', $book->city) }}">

            <label>Rak Buku</label>
            <select name="bookshelf_id">

                @foreach ($bookshelves as $bookshelf)

                    <option value="{{ $bookshelf->id }}"
                        {{ old('bookshelf_id', $book->bookshelf_id) == $bookshelf->id ? 'selected' : '' }}>

                        {{ $bookshelf->name }}

                    </option>

                @endforeach

            </select>

            <label>Cover Lama</label>
            <br>

            <img src="{{ asset('cover/'.$book->cover) }}" width="120">

            <label>Ganti Cover</label>
            <input type="file" name="cover">

            <button type="submit" class="btn-submit">
                Update Buku
            </button>

        </form>

        <a href="{{ route('books.index') }}" class="btn-kembali">
            ← Kembali ke Data Buku
        </a>

    </div>

</body>
</html>