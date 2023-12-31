<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulir Sewa</title>
    <style>
        .flex-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <article>
        <div class="container mt-2">
            <h1>Formulir Pengisian Penyewaan Mobil</h1>
            <form action="/formulir/Sukses" method="post">
            <? csrf_field() ?>

            <div class="form-group">
                <label for="nama"><b>Nama Penyewa : </b></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Penyewa">
            </div>

            <div class="form-group ">
                <label for="mobil"><b>Pilih Mobil : </b></label>
                <select name="mobil" id="mobil" class="form-control col-sm-12">
                    <?php $db = \Config\Database::connect();
                    $query = $db->query('Select * from mobil');

                    $row = $query->getRow();
                    foreach ($query->getResult('array') as $row) {
                        if (isset($row)) { ?>
                            <option><?php echo $row['nama_kendaraan']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>

            <div class="form-group ">
                <label for="sopir"><b>Pilih Sopir : </b></label>
                <select name="sopir" id="sopir" class="form-control col-sm-12">
                    <option selected>Tidak dengan Sopir</option>
                    <?php $db = \Config\Database::connect();
                    $query = $db->query('Select * from supir');

                    $row = $query->getRow();
                    foreach ($query->getResult('array') as $row) {
                        if (isset($row)) { ?>
                            <option><?php echo $row['nama_supir']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pinjam"><b>Tanggal Pinjam :</b> </label>
                <input type="date" class="form-control" name="pinjam" id="pinjam" placeholder="ID Kendaraan">
            </div>

            <div class="form-group">
                <label for="kembali"><b>Tanggal Kembali :</b> </label>
                <input type="date" class="form-control" name="kembali" id="kembali" placeholder="ID Kendaraan">
            </div>
            <div class="flex-container">
                <input type="submit" value="Kirim" class="btn btn-primary">
                <a href="/customer" class="btn btn-danger mt-2">Kembali</a>
            </div>

            </form>
        </div>
    </article>
</body>

</html>