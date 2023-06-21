<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Data Supir</title>


</head>

<body>
    <article>
        <div class="container">
            <h1>Data Supir</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Supir</th>
                        <th scope="col">Nama Supir</th>
                        <th scope="col">Alamat Supir</th>



                        <th scope="col">no telepon Supir</th>

                        <th scope="col">Foto Supir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $db = \Config\Database::connect();
                    $query = $db->query('Select * from supir');

                    $row = $query->getRow();
                    foreach ($query->getResult('array') as $row) {
                        if (isset($row)) { ?>
                            <tr>
                                <td><?php echo $row['idSupir']; ?></td> <!-- //Bisa diganti dengan NIM-->
                                <td><?php echo $row['nama_supir']; ?></td> <!-- //Bisa diganti dengan NAMA-->
                                <td><?php echo $row['alamat_supir']; ?></td> <!-- //Bisa diganti dengan PRAKTIKUM-->



                                <td><?php echo $row['no_telp_supir']; ?></td> <!-- //Bisa diganti dengan PRAKTIKUM-->

                                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['foto_supir']); ?>" alt="Foto Supir" width="100" height="100"></td>
                            </tr>
                    <?php  }
                    } ?>
                </tbody>
            </table>
            <a href="/asisten/simpan" class="btn btn-primary">Tambah Supir</a>
            <a href="/asisten/update" class="btn btn-primary">Update Supir</a>
            <a href="/asisten/hapus" class="btn btn-danger">Hapus Supirr</a>
            <a href="/asisten/search" class="btn btn-primary">Cari</a>
            <a href="/asisten/logout" class="btn btn-primary">Log Out</a>
        </div>

    </article>
</body>

</html>