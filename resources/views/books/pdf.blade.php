<h1>Data Buku</h1>

<table border="1" width="100%" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
    </tr>

    @foreach($books as $book)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->publisher }}</td>
    </tr>
    @endforeach
</table>