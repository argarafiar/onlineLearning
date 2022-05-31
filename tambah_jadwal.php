<?php

require 'functions.php';

  if(isset($_POST["daftar"])) {
      if(daftar_jadwal($_POST) > 0) {
          echo "
              <script>
                  alert('Data jadwal berhasil ditambahkan!');
                  document.location.href = 'jadwal.php?username=arga';
              </script>
          ";
      } else {
          echo "
              <script>
                  alert('Data gagal ditambahkan!');
              </script>
          ";
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/styles.css">
<title>Document</title>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-2 order-lg-1">
                  <img src="img/gambar-jurusan.jpg" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-1 order-lg-2">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Form Jadwal</p>
  
                  <form class="mx-1 mx-md-4" action="" method="post">
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-calendar-days fa-lg me-3 fa-fw mr-2"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama Mata Kuliah" required/>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-clipboard fa-lg me-3 fa-fw mr-2"></i>
                      <div class="form-outline flex-fill mb-0">
                        <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Keterangan" required></textarea>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa-solid fa-code fa-lg me-3 fa-fw mr-2"></i>
                        <select class="form-control" id="jurusan" name="jurusan" required>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                        </select>
                    </div>
  
                    <div class="form-check d-flex mb-5">
                      <input class="form-check-input mr-auto" type="checkbox" value="" id="form2Example3c" required/>
                      <label class="form-check-label" for="form2Example3">
                            I agree all statements in <a href="#">Terms of service</a>
                      </label>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg" name="daftar">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>