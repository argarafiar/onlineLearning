<?php
    require 'functions.php';

    $users = query("SELECT * FROM users WHERE username = '$_GET[username]'");
    $user = $users[0];
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
    <title>Profile || PENS</title>
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
                    <a class="nav-link active text-white" href="index.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="profile.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-user mr-2"></i>Profile</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="mahasiswa.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-graduation-cap mr-2"></i>Daftar Mahasiswa</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dosen.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-chalkboard-user mr-2"></i>Daftar Dosen</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="jadwal.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-calendar-days mr-2"></i>Jadwal Kuliah</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="nilai.php?username=<?= $user["username"] ?>"><i class="fa-solid fa-square-poll-horizontal mr-2"></i>Nilai Mahasiswa</a><hr class="bg-secondary">
                </li>
                <br><br><br>
                <li class="nav-item mt-1">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</a><hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-2" style="left: 220px;">
            <h3><i class="fa-solid fa-user mr-2"></i> Profile</h3><hr>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
        
                            <div class="card-body">
                                <div class="card-title mb-4">
                                    <div class="d-flex justify-content-start">
                                        <div class="image-container">
                                            <img src="img_profile/<?= $user["image"] ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                        </div>
                                        <div class="userData ml-3">
                                            <h2 class="d-block text-primary" style="font-size: 1.5rem; font-weight: bold"><?= $user["username"] ?></h2>
                                            <h6 class="d-block"> <?= $user["role"] ?> || EEPIS</h6>
                                        </div>
                                        <div class="ml-auto">
                                            <a href="edit.php?username=<?= $user["username"] ?>" class="btn btn-info"><i class="fa-solid fa-pen mr-2"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content ml-1" id="myTabContent">
                                            <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                                
        
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Full Name</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?= $user["name"] ?>
                                                    </div>
                                                </div>
                                                <hr />
        
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Gender</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?= $user["gender"] ?>
                                                    </div>
                                                </div>
                                                <hr />
                                                
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Bio</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?= $user["bio"] ?>
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