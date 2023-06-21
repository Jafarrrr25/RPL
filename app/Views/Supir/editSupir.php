<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Supir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/stylesupir.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Update Supir</h1>
        <form action="/Supir/editSupir" method="post" class="mt-5">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="idSupir" class="form-label">ID SUPIR:</label>
                <input type="text" class="form-control" id="idSupir" name="idSupir">
            </div>
            <div class="mb-3">
                <label for="nama_supir" class="form-label">NAMA SUPIR:</label>
                <input type="text" class="form-control" id="nama_supir" name="nama_supir">
            </div>
            <div class="mb-3">
                <label for="alamat_supir" class="form-label">ALAMAT SUPIR:</label>
                <input type="text" class="form-control" id="alamat_supir" name="alamat_supir">
            </div>
            <div class="mb-3">
                <label for="no_telp_supir" class="form-label">NO TELEPON SUPIR:</label>
                <input type="text" class="form-control" id="ipk" name="ipk">
            </div>
            <div class="mb-3">
                <label for="foto_supir" class="form-label">FOTO SUPIR:</label>
                <input type="file" class="form-control" id="foto_supir" name="foto_supir">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>