<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h1 class="mb-4">Tambah Buku</h1>

    <form action="/books" method="POST">
        @csrf

        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control">
        </div>

        <div class="mb-3">
            <label>Category ID</label>
            <input type="number" name="category_id" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

</body>
</html>