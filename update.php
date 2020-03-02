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
                    <table class="table table-striped">
                        <h5>Daftar Pegawai</h4>
                            <?php
                            if ($_SESSION['level'] == 'ADMIN') :
                                ?>
                                <a class="btn btn-primary btn-sm mb-3" href="">Tambah Pegawai</a>
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
                                        <th scope="row"><?= $pegawais['iddep'] ?></th>
                                        <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                            <th scope="row"><?= $pegawais['password'] ?></th>
                                        <?php endif ?>
                                        <th scope="row"><?= $pegawais['alamat'] ?></th>
                                        <th scope="row">
                                            <a href="" class="btn btn-sm btn-primary">Update</a>
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