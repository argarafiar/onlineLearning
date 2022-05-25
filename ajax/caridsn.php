<?php
    require '../functions.php';

    $keyword = $_GET["keyword"];
    $user = $_GET["role"];
    $query = "SELECT * FROM dosen WHERE
                    name LIKE '%$keyword%' OR
                    nik LIKE '%$keyword%' OR
                    email LIKE '%$keyword%' OR
                    bidang LIKE '%$keyword%'
                    ";
    $dsn = query($query);
?>

<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Email</th>
                            <th scope="col">Bidang</th>
                            <?php if($user == "admin") : ?>
                                <th colspan="3" scope="col">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <?php $i=1 ?>
                    <tbody>
                        <?php foreach($dsn as $d): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $d["name"] ?></td>
                                <td><?= $d["nik"] ?></td>
                                <td><?= $d["email"] ?></td>
                                <td><?= $d["bidang"] ?></td>
                                <?php if($user == "admin") : ?>
                                    <td class="text-center"><a href="detail_dsn.php?username=<?= $d["username"] ?>" class="btn btn-primary">Detail</a></td>                        
                                    <td class="text-center"><a href="edit_dsn.php?username=<?= $d["username"] ?>" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa-solid fa-edit"></i></a></td>
                                    <td class="text-center"><a href="hapus.php?username=<?= $d["username"] ?>" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa-solid fa-trash"></i></a></td>
                                <?php endif; ?>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
</table>

