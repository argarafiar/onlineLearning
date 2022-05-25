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

    <div class="row no-gutters mt-5 fixed-top">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="profile.php"><i class="fa-solid fa-user mr-2"></i>Profile</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="mahasiswa.php"><i class="fa-solid fa-graduation-cap mr-2"></i>Daftar Mahasiswa</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dosen.php"><i class="fa-solid fa-chalkboard-user mr-2"></i>Daftar Dosen</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="jadwal.php"><i class="fa-solid fa-calendar-days mr-2"></i>Jadwal Kuliah</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="nilai.php"><i class="fa-solid fa-square-poll-horizontal mr-2"></i>Nilai Mahasiswa</a><hr class="bg-secondary">
                </li>
                <br><br><br>
                <li class="nav-item mt-1">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</a><hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fa-solid fa-chalkboard-user mr-2"></i> Daftar Dosen</h3><hr>
            <div class="d-flex">
                <a href="" class="btn btn-primary mb-3"><i class="fa-solid fa-plus mr-2"></i>Tambah Data Dosen</a>
                <form class="form-inline my-2 my-lg-0 ml-auto pb-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Email</th>
                        <th scope="col">Bidang</th>
                        <th colspan="3" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>3121600010</td>
                        <td>mira@gmail.com</td>
                        <td>Teknik Informatika</td>
                        <td class="text-center"><a href="#" class="btn btn-primary">Detail</a></td>                        
                        <td class="text-center"><a href="#" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa-solid fa-edit"></i></a></td>
                        <td class="text-center"><a href="#" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>3121600010</td>
                        <td>mira@gmail.com</td>
                        <td>Teknik Informatika</td>
                        <td class="text-center"><a href="#" class="btn btn-primary">Detail</a></td>                        
                        <td class="text-center"><a href="#" class="btn btn-info"><i class="fa-solid fa-edit"></i></a></td>
                        <td class="text-center"><a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>3121600010</td>
                        <td>mira@gmail.com</td>
                        <td>Teknik Informatika</td>
                        <td class="text-center"><a href="#" class="btn btn-primary">Detail</a></td>                        
                        <td class="text-center"><a href="#" class="btn btn-info"><i class="fa-solid fa-edit"></i></a></td>
                        <td class="text-center"><a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                </tbody>
            </table>
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