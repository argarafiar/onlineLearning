<?php
    require 'functions.php';

    $users = query("SELECT * FROM users WHERE username = '$_GET[username]'");
    $user = $users[0];
    $mhs = query("SELECT * FROM mhs WHERE jurusan = '$_GET[jurusan]'");

    $tugas = query("SELECT * FROM tugas WHERE jurusan = '$_GET[jurusan]'");

    if($user["role"] == "user"){
        $nrp = query("SELECT nrp FROM mhs WHERE username = '$_GET[username]'")[0];
        $nilai = query("SELECT nilai FROM files WHERE nrp = '$nrp[nrp]'");
    }
    // var_dump($nilai);
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
    <title>Kelas || PENS</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
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
        <div class="col-md-10 p-5 m-auto">
            <h3><i class="fa-solid fa-user mr-2"></i> <?= $mhs[0]["jurusan"] ?></h3><hr>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title mb-4">
                                    <div class="d-flex justify-content-start">
                                        <div class="ml-auto">
                                            <a href="jadwal.php?username=<?= $user["username"] ?>" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Mahasiswa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Tugas</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content ml-1" id="myTabContent">
                                            <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">NO</th>
                                                    <th scope="col">Nama Mahasiswa</th>
                                                    <th scope="col">NRP</th>
                                                    <th scope="col">Kelas</th>
                                                    </tr>
                                                </thead>
                                                <?php $i=1 ?>
                                                <tbody>
                                                    <?php foreach($mhs as $m) : ?>
                                                        <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $m["name"] ?></td>
                                                        <td><?= $m["nrp"] ?></td>
                                                        <td><?= $m["kelas"] ?></td>
                                                        </tr>
                                                        <?php $i++ ?>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                <?php if($user["role"] == "dosen") : ?>
                                                        <a class="btn btn-primary" href="tambah_tugas.php?jurusan=<?= $mhs[0]["jurusan"]; ?>&username=<?= $user["username"] ?>">Tambah tugas</a>
                                                <?php endif ?>
                                                <?php foreach($tugas as $tgs) : ?>
                                                    <div class="card mt-5" style="width: 18rem;">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $tgs["judul"] ?></h5>
                                                            <h6 class="card-subtitle mb-2 text-muted">Deadline : <?= $tgs["tanggal"] ?> <?= $tgs["waktu"] ?></h6>
                                                            <p class="card-text"><?= $tgs["keterangan"] ?></p>
                                                            <div class="d-flex justify-content-between">
                                                                <?php if($user["role"] == "user" || $user["role"] == "dosen") : ?>
                                                                    <a href="submit_tugas.php?jurusan=<?= $mhs[0]["jurusan"]; ?>&username=<?= $user["username"] ?>&id=<?= $tgs["id"] ?>" class="card-link btn btn-info">Pengumpulan</a>
                                                                    <?php if($user["role"] == "user") : ?>
                                                                        <?php if($nilai == NULL) : ?>
                                                                            <p>Tugas belum di kumpulkan</p>
                                                                        <?php else : ?>
                                                                            <p>Nilai : <?= $nilai[0]["nilai"] ?>/100</p>
                                                                        <?php endif ?>
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="js/index.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
-->
</body>
</html>