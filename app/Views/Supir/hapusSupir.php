<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/stylesupir.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">HAPUS Supir</h1>
        <form action="/asisten/delete" method="post" class="mt-5">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="idSupir" class="form-label">Masukan ID Supir:</label>
                <input type="text" class="form-control" id="idSupir" name="idSupir">
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>