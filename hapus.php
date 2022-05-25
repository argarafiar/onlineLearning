<?php
    require 'functions.php';

    $username = query("SELECT * FROM users WHERE username = '$_GET[username]'")[0];

    if( hapus($username) > 0 ) :
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php?username=arga';
            </script>
        ";
    else :
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php?username=arga';
            </script>
        ";
    endif;
?>