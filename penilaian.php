<?php
    require 'functions.php';

    $nrp = $_GET["nrp"];
    $username = $_GET["username"];
    $jurusan = $_GET["jurusan"];
    $id = $_GET["id"];

    if(isset($_POST["submit"])) {
        if(nilai($_POST) > 0) {
            echo "
                <script>
                    alert('nilai berhasil ditambahkan!');
                    document.location.href = 'submit_tugas.php?jurusan=$jurusan&username=$username&id=$id';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('nilai gagal ditambahkan!');
                    document.location.href = 'submit_tugas.php?jurusan=$jurusan&username=$username&id=$id';
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
    <form class="p-5" action="" method="post">
        <div class="form-group" style="text-align: center;">
            <label for="exampleFormControlInput1">Masukkan nilai</label>
            <input type="text" class="form-control m-auto" id="exampleFormControlInput1" name="nilai" placeholder="0 - 100" style="width: 18rem;">
            <input type="hidden" name="nrp" value="<?= $nrp ?>">
            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        </div>
    </form>
</body>
</html>