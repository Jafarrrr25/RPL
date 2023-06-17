<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Tambah Mobil</title>
</head>

<body>
    <article>
        <div class="container mt-2">
            <h1>Tambah Data Mobil</h1>
            <form action="simpan" method="post">
                <? csrf_field() ?>
                <div class="form-group">
                    <label for="nim"><b>ID Supir :</b> </label>
                    <input type="text" class="form-control" name="idSupir" id="idSupir" aria-describedby="nim" placeholder="ID Supir">
                </div>
                <div class="form-group">
                    <label for="nama"><b>Nama Supir : </b> </label>
                    <input type="text" class="form-control" name="nama_supir" id="nama_supir" placeholder="Nama Supir">
                </div>
                <div class="form-group">
                    <label for="ipk"><b>Nomor Plat : </b></label>
                    <input type="text" class="form-control" name="alamat_supir" id="alamat_supir" placeholder="Alamat Supir">
                </div>
                <div class="form-group">
                    <label for="ipk"><b>No Telefon Supir : </b></label>
                    <input type="text" class="form-control" name="no_telp_supir" id="no_telp_supir" placeholder="no telp supir">
                    <div class="form-group">
                        <label for="foto"><b>Foto Supir :</b></label>
                        <input type="file" class="form-control" name="foto_supir" id="foto_supir" accept="image/*">
                    </div>

                    <input type="submit" name="" value="Simpan" class="btn btn-primary mt-2" />
            </form>
        </div>
    </article>
</body>

</html>