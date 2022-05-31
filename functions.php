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

        if($role == "user"){
            mysqli_query($conn, "INSERT INTO mhs (id, name, username) 
                                VALUES ('', '$name', '$username')");
        } else if($role == "dosen"){
            mysqli_query($conn, "INSERT INTO dosen (id, name, username) 
                                VALUES ('', '$name', '$username')");
        }

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

    function daftar_mhs($data){
        global $conn;

        $name = htmlspecialchars($data["name"]);
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $passwordtmp = mysqli_real_escape_string($conn, $data["passwordtmp"]);
        $role = htmlspecialchars($data["role"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

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

        $cocok = mysqli_query($conn, "SELECT nrp FROM mhs WHERE nrp = '$nrp'");
        if( mysqli_fetch_assoc($cocok) ) {
            echo "<script>
                    alert('NRP sudah ada!');
                </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users (id, name, username, password, role) 
                            VALUES ('', '$name', '$username', '$password', '$role')");
        mysqli_query($conn, "INSERT INTO mhs 
                            VALUES ('', '$name', '$username', '$nrp', '$kelas', '$jurusan')");

        return mysqli_affected_rows($conn);
    }

    function edit_mhs($data){
        global $conn;

        $id = htmlspecialchars($data["id"]);
        $name = htmlspecialchars($data["name"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $username = strtolower(stripslashes($data["username"]));
        $kelas = htmlspecialchars($data["kelas"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $query = "UPDATE mhs SET
                    name = '$name',
                    kelas = '$kelas',
                    jurusan = '$jurusan',
                    nrp = '$nrp'
                    WHERE id = '$id'
                    ";

        $query2 = "UPDATE users SET
                    name = '$name'
                    WHERE username = '$username'
                    ";

        mysqli_query($conn, $query);
        mysqli_query($conn, $query2);
        return mysqli_affected_rows($conn);
    }

    function daftar_dsn($data){
        global $conn;

        $name = htmlspecialchars($data["name"]);
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $passwordtmp = mysqli_real_escape_string($conn, $data["passwordtmp"]);
        $role = htmlspecialchars($data["role"]);
        $nik = htmlspecialchars($data["nik"]);
        $email = htmlspecialchars($data["email"]);
        $bidang = htmlspecialchars($data["bidang"]);

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

        $cocok = mysqli_query($conn, "SELECT nik FROM dosen WHERE nik = '$nik'");
        if( mysqli_fetch_assoc($cocok) ) {
            echo "<script>
                    alert('NIK sudah ada!');
                </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users (id, name, username, password, role) 
                            VALUES ('', '$name', '$username', '$password', '$role')");
        mysqli_query($conn, "INSERT INTO dosen 
                            VALUES ('', '$name', '$username', '$nik', '$email', '$bidang')");

        return mysqli_affected_rows($conn);
    }

    function edit_dsn($data){
        global $conn;

        $id = htmlspecialchars($data["id"]);
        $name = htmlspecialchars($data["name"]);
        $nik = htmlspecialchars($data["nik"]);
        $username = strtolower(stripslashes($data["username"]));
        $email = htmlspecialchars($data["email"]);
        $bidang = htmlspecialchars($data["bidang"]);

        $query = "UPDATE dosen SET
                    name = '$name',
                    email = '$email',
                    bidang = '$bidang',
                    nik = '$nik'
                    WHERE id = '$id'
                    ";

        $query2 = "UPDATE users SET
                    name = '$name'
                    WHERE username = '$username'
                    ";

        mysqli_query($conn, $query);
        mysqli_query($conn, $query2);
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

    function upload_tugas($data){
        global $conn;

        $name = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $tmp_file = $_FILES['file']['tmp_name'];
        $tanggal = date('Y-m-d');
        $nrp = htmlspecialchars($data["nrp"]);
        $jurusan = htmlspecialchars($data["jurusan"]);


        //cek apakah tidak ada file yang diupload
        if($error === 4) {
            echo "<script>
                    alert('Pilih file terlebih dahulu!');
                </script>";
            return false;
        }

        //cek apakah yang diupload adalah file
        $ekstensi = ['pdf', 'doc', 'docx'];
        $ekstensi_file = explode('.', $name);
        $ekstensi_file = strtolower(end($ekstensi_file));
        if( !in_array($ekstensi_file, $ekstensi) ) {
            echo "<script>
                    alert('Yang anda pilih bukan file!');
                </script>";
            return false;
        }

        //cek jika ukuran file terlalu besar
        if( $ukuran > 1000000 ) {
            echo "<script>
                    alert('Ukuran file terlalu besar!');
                </script>";
            return false;
        }

        move_uploaded_file($tmp_file, 'files/' . $name);

        $query = "INSERT INTO files (id, name, nrp, tanggal, jurusan) 
                    VALUES ('', '$name', '$nrp', '$tanggal', '$jurusan')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapus($data) {
        global $conn;

        $username = htmlspecialchars($data["username"]);
        mysqli_query($conn, "DELETE FROM users WHERE username = '$username'");
        if($data["role"] == "user") {
            mysqli_query($conn, "DELETE FROM mhs WHERE username = '$username'");
        } else if($data["role"] == "dosen") {
            mysqli_query($conn, "DELETE FROM dosen WHERE username = '$username'");
        }
        return mysqli_affected_rows($conn);
    }

    function daftar_jadwal($data){
        global $conn;

        $name = htmlspecialchars($data["name"]);
        $bio = htmlspecialchars($data["bio"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $query = "INSERT INTO matkul VALUES ('', '$name', '$bio', '$jurusan')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function tambah_tugas($data){
        global $conn;

        $judul = htmlspecialchars($data["judul"]);
        $sub = htmlspecialchars($data["sub"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        $tanggal = htmlspecialchars($data["tanggal"]);
        $waktu = htmlspecialchars($data["waktu"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $query = "INSERT INTO tugas
                    VALUES ('', '$judul', '$sub', '$keterangan', '$tanggal', '$waktu', '$jurusan')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function nilai($data){
        global $conn;

        $nrp = htmlspecialchars($data["nrp"]);
        $nilai = htmlspecialchars($data["nilai"]);

        $query = "UPDATE files SET
                    nilai = '$nilai'
                    WHERE nrp = '$nrp'
                    ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>