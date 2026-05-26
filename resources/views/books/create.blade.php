<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f5f2;
            margin: 30px;
            color: #5c5470;
        }

        .card{
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            width: 500px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        h1{
            margin-bottom: 20px;
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

        .error{
            color: #d62828;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        input,
        select{
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button{
            background-color: #a0c4b8;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover{
            background-color: #84a59d;
        }

    </style>

</head>
<body>

    <div class="card">

        <h1>Tambah Buku</h1>

        @if ($errors->any())

            <div class="error-box">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('books.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <label>Judul Buku</label>

            <input type="text"
                   name="title"
                   value="{{ old('title') }}">

            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Author</label>

            <input type="text"
                   name="author"
                   value="{{ old('author') }}">

            @error('author')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Tahun Publish</label>

            <input type="number"
                   name="year_publish"
                   value="{{ old('year_publish') }}">

            @error('year_publish')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Penerbit</label>

            <input type="text"
                   name="publisher"
                   value="{{ old('publisher') }}">

            @error('publisher')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Kota</label>

            <input type="text"
                   name="city"
                   value="{{ old('city') }}">

            @error('city')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Cover</label>

            <input type="file"
                   name="cover">

            @error('cover')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Rak Buku</label>

            <select name="bookshelf_id">

                <option value="">
                    -- Pilih Rak Buku --
                </option>

                @foreach ($bookshelves as $bookshelf)

                    <option value="{{ $bookshelf->id }}"
                        {{ old('bookshelf_id') == $bookshelf->id ? 'selected' : '' }}>

                        {{ $bookshelf->name }}

                    </option>

                @endforeach

            </select>

            @error('bookshelf_id')
                <div class="error">{{ $message }}</div>
            @enderror


            <button type="submit">
                Simpan
            </button>

        </form>

    </div>

</body>
</html>