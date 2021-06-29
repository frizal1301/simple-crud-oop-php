<?php
    session_start();
    require_once 'App/init.php';
    $db = new Database();
    if( !isset($_SESSION['login']) == 'true'){
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <meta charset="UTF-8">
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data</a>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 1; ;
            foreach($db->tampilData() as $d):
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nim']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['jenkel']; ?></td>
                <td><?= $d['jurusan']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $d['id'];?>">Edit</a>
                    <a href="delete.php?id=<?= $d['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>


    </table>

</body>
