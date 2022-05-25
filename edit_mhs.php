<?php
    require 'functions.php';

    $mhs = query("SELECT * FROM mhs WHERE username = '$_GET[username]'");
    $m = $mhs[0];

    if(isset($_POST["submit"])) :
        if( edit_mhs($_POST) > 0 ) :
            echo "
                <script>
                    alert('Data berhasil di edit!');
                    document.location.href = 'mahasiswa.php?username=arga';
                </script>
            ";
        else :
            echo "
                <script>
                    alert('Data berhasil di edit!');
                </script>
            ";
        endif;
    endif;
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
    <title>Edit Profile</title>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $m["id"]; ?>">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edit Data Mahasiswa</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Nama</label>
                                <input type="text" class="form-control" name="name" value="<?= $m["name"] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <?php if($m["nrp"] == NULL) : ?>
                                    <label class="labels">NRP</label>
                                    <input type="text" class="form-control" name="nrp" value="<?= $m["nrp"] ?>" required>
                                <?php else : ?>
                                    <input type="hidden" name="nrp" value="<?= $m["nrp"] ?>">
                                <?php endif; ?>
                                    <input type="hidden" name="username" value="<?= $m["username"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label class="labels">kelas</label>
                                <input type="text" class="form-control" name="kelas" value="<?= $m["kelas"] ?>" required>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="labels">Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan" required>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Komputer">Teknik Komputer</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex mt-5 text-center mx-auto justify-content-between">
                            <a href="mahasiswa.php?username=arga" class="btn btn-danger">Back</a>
                            <button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>