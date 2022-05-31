<?php
    require 'functions.php';

    $username = $_GET["username"];
    $jurusan = $_GET["jurusan"];

    if(isset($_POST["submit"])) {
        if(tambah_tugas($_POST) > 0) {
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'kelas.php?username=$username&jurusan=$jurusan';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan!');
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
          <form class="needs-validation" action="" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Judul tugas</label>
                <input type="text" class="form-control" id="firstName" name="judul" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Sub judul</label>
                <input type="text" class="form-control" id="lastName" name="sub" required>
              </div>
            </div>
    
            <div class="mb-3">
                <label for="exampleFormControlTextarea1">Keterangan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
            </div>
    
            <div class="mb-3">
              <label for="address">Deadline</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" required>
              <input type="time" class="form-control mt-1" id="waktu" name="waktu" required>
              <input type="hidden" name="jurusan" value="<?= $jurusan ?>">
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Submit</button>
          </form>
        </div>
      </div>



    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>
</html>