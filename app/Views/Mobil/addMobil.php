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
            <form action="addData" method="post">
                <? csrf_field() ?>
                <div class="form-group">
                    <label for="nim"><b>ID Kendaraan :</b> </label>
                    <input type="text" class="form-control" name="idk" id="idk" aria-describedby="nim" placeholder="ID Kendaraan">
                </div>
                <div class="form-group">
                    <label for="nama"><b>Nama Kendaraan : </b> </label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kendaraan">
                </div>
                <div class="form-group">
                    <label for="ipk"><b>Nomor Plat : </b></label>
                    <input type="text" class="form-control" name="plat" id="plat" placeholder="Plat Mobil">
                </div>
                <div class="form-group">
                    <label for="ipk"><b>Tipe Mobil : </b></label>
                    <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe Mobil">
                </div>
                <div class="form-group">
                    <label for="nim"><b>Tanggal Pajak :</b> </label>
                    <input type="date" class="form-control" name="tgl_pjk" id="tgl_pjk" placeholder="ID Kendaraan">
                </div>
                <div class="form-group ">
                    <label for="status"><b>Status Mobil : </b></label>
                    <select name="status" id="status" class="form-control col-sm-12">
                        <option selected>Tersedia</option>
                        <option>Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ipk"><b>Warna : </b></label>
                    <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna Mobil">
                </div>
                <div class="form-group">
                    <label for="ipk"><b>Harga Sewa : </b></label>
                    <input type="text" class="form-control" name="sewa" id="sewa" placeholder="Harga Sewa">
                </div>
                <div class="form-group">
                    <label for="foto"><b>Unggah Foto Mobil :</b></label>
                    <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                </div>

                <!-- <div class="form-group">
                    <label for="ipk"><b>Unggah Foto Mobil : </b></label>
                    <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                </div> -->
                <input type="submit" name="" value="Simpan" class="btn btn-primary mt-2" />
            </form>
        </div>
    </article>
</body>

</html>