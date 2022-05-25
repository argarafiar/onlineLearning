<?php
    require '../functions.php';

    $keyword = $_GET["keyword"];
    $user = $_GET["role"];
    $query = "SELECT * FROM mhs WHERE
                    name LIKE '%$keyword%' OR
                    nrp LIKE '%$keyword%' OR
                    kelas LIKE '%$keyword%' OR
                    jurusan LIKE '%$keyword%'
                    ";
    $mhs = query($query);
?>

<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <?php if($user == "admin") : ?>
                                <th colspan="3" scope="col">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <?php $i=1 ?>
                    <tbody>
                        <?php foreach($mhs as $m): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m["name"] ?></td>
                                <td><?= $m["nrp"] ?></td>
                                <td><?= $m["kelas"] ?></td>
                                <td><?= $m["jurusan"] ?></td>
                                <?php if($user == "admin") : ?>
                                    <td class="text-center"><a href="detail_mhs.php?username=<?= $m["username"] ?>" class="btn btn-primary">Detail</a></td>                        
                                    <td class="text-center"><a href="edit_mhs.php?username=<?= $m["username"] ?>" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa-solid fa-edit"></i></a></td>
                                    <td class="text-center"><a href="hapus.php?username=<?= $m["username"] ?>" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa-solid fa-trash"></i></a></td>
                                <?php endif; ?>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
</table>