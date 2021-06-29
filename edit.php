<?php
    require_once 'App/init.php';
    $db = new Database();
    
    
    $id = $_GET['id'];
    if( isset($_POST['kirim']) ) {
        $nama = $_POST['nama'];
        $jenkel = $_POST['jenkel'];
        $jurusan = $_POST['jurusan'];

        $query = $db->updateData($id, $nama, $jenkel, $jurusan);
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <a href="index.php">Kembali</a>
    <?php $row = $db->tampilkanSatuData($id);?>
    <table>
        <form action="" method="post">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?= $row['nim']; ?> " disabled></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenkel" id="jenkel">
                        <?php if($row['jenkel'] === "Pria"){?>
                            <option value="Pria" selected>Pria</option>
                            <option value="Wanita">Wanita</option>
                        <?php } else {?>
                            <option value="Pria">Pria</option>
                            <option value="Wanita" selected>Wanita</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?= $row['jurusan']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="kirim"></td>
            </tr>
        </form>
    </table>

</body>