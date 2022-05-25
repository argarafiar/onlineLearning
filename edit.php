<?php
    require 'functions.php';

    $users = query("SELECT * FROM users WHERE username = '$_GET[username]'");
    $user = $users[0];

    if(isset($_POST["submit"])) :
        if( edit($_POST) > 0 ) :
            echo "
                <script>
                    alert('Data berhasil di edit!');
                </script>
            ";
        else :
            echo "
                <script>
                    alert('Data gagal di edit!');
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
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $user["id"]; ?>">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="200px" src="img_profile/<?= $user["image"] ?>">
                        <input type="hidden" name="imagelama" value="<?= $user["image"]; ?>">
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $user["name"] ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Username</label>
                                <input type="text" class="form-control"  name="username" value="<?= $user["username"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label class="labels">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Famale">Famale</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="labels">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3"><?= $user["bio"] ?></textarea>
                            </div>
                        </div>
                        <div class="d-flex mt-5 text-center mx-auto justify-content-between">
                            <a href="profile.php?username=<?= $user["username"] ?>" class="btn btn-danger">Back</a>
                            <button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>