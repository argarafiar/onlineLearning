<?php
    require 'functions.php';

    if(isset($_POST["login"])) {
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

        // cek username
        if(mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            // if(password_verify($password, $row["password"])) {
            if($password === $row["password"]) {
                // if($row["role"] == "admin") {
                //     $_POST["role"] = true;
                // } else {
                //     $_POST["role"] = false;
                // }
                // $_SESSION["login"] = true;
                // if(isset($_POST["remember"])) {
                //     setcookie("id", $row["id"], time() + 120);
                //     setcookie("key", hash('sha256', $row["username"]), time() + 120);
                // }
                if($row["role"] == "admin"){
                  header("Location: index.html?role=admin");
                } else {
                  header("Location: index.html?role=user");
                }
                exit;
            } else {
                echo "<script>
                    alert('Password salah!');
                </script>";
            }
        } else {
            echo "<script>
                alert('Username belum terdaftar!');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<section>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black shadow">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <form action="" method="post">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="text" name="username" class="form-control"
                      placeholder="Username" />
                  </div>

                  <div class="form-outline mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                
                <input class="mb-2 mr-2" type="checkbox">Remember me

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg mb-3" type="submit" name="login">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center">
                    <p class="mb-0 mr-2">Don't have an account?</p>
                    <a href="#" type="button" class="btn btn-outline-danger">Create new</a>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
              <img class="img-fluid" src="img/gambarlogin.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>