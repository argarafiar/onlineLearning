<?php
    require 'functions.php';

    $users = query("SELECT * FROM users WHERE username = '$_GET[username]'");
    $user = $users[0];

    if($user["role"] != "admin"){
        if($user["role"] == "user"){
            $mhs = query("SELECT * FROM mhs WHERE username = '$_GET[username]'")[0];
            $jurusan = $mhs["jurusan"];
        }else if($user["role"] == "dosen"){
            $dosen = query("SELECT * FROM dosen WHERE username = '$_GET[username]'")[0];
            $jurusan = $dosen["bidang"];
        }
    
        $jadwal = query("SELECT * FROM matkul WHERE jurusan = '$jurusan'");
    } else {
        $jadwal = query("SELECT * FROM matkul");
    }
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
            <h3><i class="fa-solid fa-calendar-days mr-2"></i> Jadwal Kuliah</h3><hr>
            <div class="row">
                <?php foreach($jadwal as $jdw) : ?>
                    <div class="card ml-5 mb-3" style="width: 18rem;;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $jdw["name"]; ?></h5>
                            <p class="card-text"><?= $jdw["bio"]; ?></p>
                            <p class="font-weight-bold" style><?= $jdw["jurusan"]; ?></p> 
                            <div class="d-flex">
                                <a href="kelas.php?username=<?= $user["username"] ?>&jurusan=<?= $jdw["jurusan"] ?>" class="card-link">Masuk Kelas <i class="fas fa-angle-double-right ml-2"></i></a>
                                <?php if($user["role"] == "admin") : ?>
                                    <a href="#" class="btn btn-info ml-auto" data-toggle="tooltip" title="Edit"><i class="fa-solid fa-edit"></i></a>
                                <?php endif; ?>
                                </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if($user["role"] == "admin") : ?>
                    <div class="card ml-5 mb-3" style="width: 18rem; height: 14rem; font-size: 3rem;">
                        <a href="tambah_jadwal.php" class="m-auto"><i class="fa-regular fa-calendar-plus" data-toggle="tooltip" title="Tambah Jadwal"></i></a>
                    </div>
                <?php endif; ?>
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