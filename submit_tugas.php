<?php
    require 'functions.php';

    $username = $_GET["username"];
    $jurusan = $_GET["jurusan"];
    $id = $_GET["id"];

    $tugas = query("SELECT * FROM tugas WHERE id = '$id'");
    $tgs = $tugas[0];

    $users = query("SELECT * FROM users WHERE username = '$username'");
    $user = $users[0];

    if($user["role"] == "user"){
        $mhs = query("SELECT * FROM mhs WHERE username = '$username'");
    } else {
        $mhs = query("SELECT * FROM mhs WHERE jurusan = '$jurusan'");
    }
    
    $files = query("SELECT * FROM files WHERE jurusan = '$jurusan'");
    // $nilai = query("SELECT nilai FROM files WHERE nrp = '$files[0][nrp]'");
    // $file = $files[0];

    if(isset($_POST["submit"])) {
        if(upload_tugas($_POST) > 0) {
            echo "
                <script>
                    alert('Tugas berhasil dikumpulkan!');
                    document.location.href = 'kelas.php?username=$username&jurusan=$jurusan';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Tugas gagal diupload!');
                    document.location.href = 'kelas.php?username=$username&jurusan=$jurusan';
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

    <div class="row m-auto p-5" style="width: 60rem;">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Penugasan</h4>
          <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Judul tugas</label>
                <div class="card">
                    <div class="card-body"><?= $tgs["judul"] ?></div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Sub judul</label>
                <div class="card">
                    <div class="card-body"><?= $tgs["sub"] ?></div>
                </div>
              </div>
            </div>
    
            <div class="mb-3">
                <label for="exampleFormControlTextarea1">Keterangan</label>
                <div class="card">
                    <div class="card-body"><?= $tgs["keterangan"] ?></div>
                </div>
            </div>
    
            <div class="mb-3">
              <label for="address">Deadline</label>
              <div class="card">
                <div class="card-body">Tanggal : <?= $tgs["tanggal"] ?></div>
                <div class="card-body">waktu : <?= $tgs["waktu"] ?></div>
              </div>
            </div>

            <div class="mb-3">
              <?php if($user["role"] == "user") : ?>
                <label for="">Upload tugas</label>
                <div class="card">
                    <div class="d-flex justify-content-between p-4">
                        <input type="file" name="file">
                        <input type="hidden" name="nrp" value="<?= $mhs[0]["nrp"] ?>">
                        <input type="hidden" name="jurusan" value="<?= $jurusan ?>">
                        <button type="submit" class="btn btn-danger" name="submit">Upload</button>
                    </div>
                </div>
              <?php endif; ?>
            </div>

            <hr class="mb-4">
            <a href="kelas.php?username=<?= $username ?>&jurusan=<?= $jurusan ?>" class="btn btn-primary btn-lg btn-block">Kembali</a>
          </form>
          <?php if($user["role"] == "dosen") : ?>
            <table class="table table-striped">
              <thead>
                  <tr>
                  <th scope="col">NRP</th>
                  <th scope="col">file</th>
                  <th scope="col">Nilai</th>
                  <th scope="col">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach($files as $file) : ?>
                      <tr>
                        <td><?= $file["nrp"] ?></td>
                        <td><?= $file["name"] ?></td>
                        <td><?= $file["nilai"] ?></td>
                        <td>
                            <a class="btn btn-info" href="penilaian.php?nrp=<?= $file["nrp"] ?>&jurusan=<?= $jurusan ?>&username=<?= $username ?>&id=<?= $id ?>">Edit</a>
                            <a class="btn btn-info" href="files/<?= $file["name"]; ?>">Download</a>
                        </td>
                      </tr>
                  <?php endforeach ?>
              </tbody>
            </table>
          <?php endif ?>
        </div>
      </div>



    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>
</html>