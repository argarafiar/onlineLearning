<?php
    require 'functions.php';

    $users = query("SELECT * FROM users WHERE username = '$_GET[username]'");
    $user = $users[0];

    $dsn = query("SELECT * FROM dosen ORDER BY nik ASC");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Dashboard || PENS</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
        <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN | <b>PENS</b></a>
            <div class="icon ml-auto">
                <h4>
                    <i class="fa-solid fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
                    <i class="fa-solid fa-bell mr-3" data-toggle="tooltip" title="Notifikasi"></i>
                    <i class="fa-solid fa-arrow-right-from-bracket mr-3" data-toggle="tooltip" title="Keluar"></i>
                </h4>
            </div>
        </div>
    </nav>

    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4 position-fixed" style="z-index: 0;">
            <ul class="nav flex-column ml-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="profile.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-user mr-2"></i>Profile</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="mahasiswa.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-graduation-cap mr-2"></i>Daftar Mahasiswa</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dosen.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-chalkboard-user mr-2"></i>Daftar Dosen</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="jadwal.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-calendar-days mr-2"></i>Jadwal Kuliah</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="nilai.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-square-poll-horizontal mr-2"></i>Nilai Mahasiswa</a><hr class="bg-secondary">
                </li>
                <br><br><br>
                <li class="nav-item mt-1">
                <a class="nav-link text-white" href="login.php"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</a><hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-2" style="left: 220px;">
            <h3><i class="fa-solid fa-chalkboard-user mr-2"></i> Daftar Dosen</h3><hr>
            <div class="d-flex">
                <?php if($user["role"] == "admin") : ?>
                    <a href="daftar_dsn.php" class="btn btn-primary mb-3"><i class="fa-solid fa-plus mr-2"></i>Tambah Data Dosen</a>
                <?php endif; ?>
                    <form class="form-inline my-2 my-lg-0 ml-auto pb-3" action="" method="post">
                    <input id="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <input id="role" type="hidden" name="role" value="<?= $user["role"] ?>">
                    <button id="button-cari" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div id="kontainer">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Email</th>
                            <th scope="col">Bidang</th>
                            <?php if($user["role"] == "admin") : ?>
                                <th colspan="3" scope="col">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <?php $i=1 ?>
                    <tbody>
                        <?php foreach($dsn as $d): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $d["name"] ?></td>
                                <td><?= $d["nik"] ?></td>
                                <td><?= $d["email"] ?></td>
                                <td><?= $d["bidang"] ?></td>
                                <?php if($user["role"] == "admin") : ?>
                                    <td class="text-center"><a href="detail_dsn.php?username=<?= $d["username"] ?>" class="btn btn-primary">Detail</a></td>                        
                                    <td class="text-center"><a href="edit_dsn.php?username=<?= $d["username"] ?>" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa-solid fa-edit"></i></a></td>
                                    <td class="text-center"><a href="hapus.php?username=<?= $d["username"] ?>" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa-solid fa-trash"></i></a></td>
                                <?php endif; ?>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
<script src="js/dsn.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
-->
</body>
</html>