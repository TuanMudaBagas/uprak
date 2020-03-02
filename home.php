<?php

session_start();

if (!$_SESSION['level']) {

    header('location:login.php');
}

require('koneksi.php');

error_reporting(0);
if ($_POST['cari']) {
    $cari = $_POST['cari'];
    $sql = "SELECT *
    FROM
    departemen
    INNER JOIN pegawai 
    ON departemen.iddep = pegawai.iddep
    WHERE idpeg LIKE '%$cari%'";
} else {
    $sql = "SELECT *
    FROM
    departemen
    INNER JOIN pegawai 
    ON departemen.iddep = pegawai.iddep";
}


$query = mysqli_query($db, $sql);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>US PRAK!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">USPRAK BAGAS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            login sebagai : <?= $_SESSION['level'] ?>
            <div class="justify-content-end collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row mt-5">
            <div class="col-8 mx-auto">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input name="cari" type="text" class="form-control" placeholder="Cari Berdasarkan Nama" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" type="button" id="button-addon2">Cari Pegawai</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <h5>Daftar Pegawai</h4>
                                <?php
                                if ($_SESSION['level'] == 'ADMIN') :
                                    ?>
                                    <a class="btn btn-primary btn-sm mb-3" href="create.php">Tambah Pegawai</a>
                                <?php
                                endif
                                ?>
                                <thead>
                                    <tr>
                                        <th scope="col">IdPeg</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">IdDep</th>
                                        <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                            <th scope="col">Passowrd</th>
                                        <?php endif ?>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($pegawais = mysqli_fetch_array($query)) : ?>
                                        <tr>
                                            <th scope="row"><?= $pegawais['idpeg'] ?></th>
                                            <td><?= $pegawais['nama'] ?></td>
                                            <th scope="row"><?= $pegawais['nama_depertemen'] ?></th>
                                            <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                                <th scope="row"><?= $pegawais['password'] ?></th>
                                            <?php endif ?>
                                            <th scope="row"><?= $pegawais['alamat'] ?></th>
                                            <th scope="row">
                                                <a href="update.php?id=<?= $pegawais['idpeg'] ?>" class="btn btn-sm btn-primary">Update</a>
                                            </th>
                                        </tr>
                                    <?php endwhile ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>