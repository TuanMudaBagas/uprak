<?php

require('koneksi.php');


$sqlDepartemen = "SELECT * FROM `departemen`";
$queryDepartemen = mysqli_query($db, $sqlDepartemen);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idpega = $_POST['idpeg'];
    $nama = $_POST['nama'];
    $departemen  = $_POST['iddep'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];


    $sqlUpdate = "INSERT INTO pegawai
                    VALUES
                    ('$idpega','$nama','$departemen','$password','$alamat')
                    ";

    $query = mysqli_query($db, $sqlUpdate);


    header("location:home.php");
}

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
            <div class="justify-content-end collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="mb-4">Tambah Pegawai</h5>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Id Pegawai</label>
                                <input name="idpeg" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Pegawai</label>
                                <input name="nama" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Departemen</label>
                                <select name="iddep" class="form-control" id="exampleFormControlSelect1">
                                    <option>Pilih Departemen</option>
                                    <?php while ($departemen = mysqli_fetch_array($queryDepartemen)) : ?>
                                        <option value="<?= $departemen['iddep'] ?>"><?= $departemen['nama_depertemen'] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Alamat</label>
                                <input name="alamat" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <a href="home.php" class="btn btn-outline-danger">Kembali Ke Home</a>
                            <button class="btn btn-primary " type="submit">Tambah Data Pegawai</button>
                        </form>
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