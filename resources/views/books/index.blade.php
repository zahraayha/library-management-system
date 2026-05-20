<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">
            Perpustakaan
        </a>

        <div>
            <a href="/dashboard" class="btn btn-light btn-sm">
                Dashboard
            </a>

            <a href="/books" class="btn btn-warning btn-sm">
                Books
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <h1 class="mb-4 text-center">Daftar Buku</h1>

    <a href="/books/create" class="btn btn-primary mb-3">
    Tambah Buku </a>

    <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Author</th>
                <th>Category ID</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name }}</td>
                <td>
                    <a href="/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="/books/{{ $book->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>