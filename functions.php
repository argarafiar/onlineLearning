<?php
    $conn = mysqli_connect("localhost", "root", "", "elearning");
    
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function daftar($data){
        global $conn;

        $name = htmlspecialchars($data["name"]);
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $passwordtmp = mysqli_real_escape_string($conn, $data["passwordtmp"]);
        $role = htmlspecialchars($data["role"]);

        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert('Username sudah ada!');
                </script>";
            return false;
        }

        if( $password !== $passwordtmp ) {
            echo "<script>
                    alert('Password tidak sama!');
                </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users (id, name, username, password, role) 
                            VALUES ('', '$name', '$username', '$password', '$role')");

        return mysqli_affected_rows($conn);
    }

    function edit($data){
        global $conn;

        $id = $data["id"];
        $name = htmlspecialchars($data["name"]);
        $username = strtolower(stripslashes($data["username"]));
        $gender = htmlspecialchars($data["gender"]);
        $bio = htmlspecialchars($data["bio"]);
        $imagelama = $data["imagelama"];

        if( $_FILES['image']['error'] === 4 ) {
            $image = $imagelama;
        } else {
            $image = upload();
        }

        $query = "UPDATE users SET
                    name = '$name',
                    username = '$username',
                    gender = '$gender',
                    bio = '$bio',
                    image = '$image'
                    WHERE id = $id
                    ";
        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload(){
        $nama_file = $_FILES['image']['name'];
        $ukuran = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmp_file = $_FILES['image']['tmp_name'];

        //cek apakah tidak ada gambar yang diupload
        if($error === 4) {
            echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        //cek apakah yang diupload adalah gambar
        $ekstensi = ['jpg', 'jpeg', 'png'];
        $ekstensi_file = explode('.', $nama_file);
        $ekstensi_file = strtolower(end($ekstensi_file));

        if( !in_array($ekstensi_file, $ekstensi) ) {
            echo "<script>
                    alert('Yang anda pilih bukan gambar!');
                </script>";
            return false;
        }

        //cek jika ukuran gambar terlalu besar
        if( $ukuran > 1000000 ) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                </script>";
            return false;
        }

        $duplikat = uniqid();
        $duplikat = $duplikat.'.'.$ekstensi_file;

        move_uploaded_file($tmp_file, 'img_profile/' . $duplikat);

        return $duplikat;
    }

?>