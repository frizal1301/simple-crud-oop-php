<?php
    require_once 'App/init.php';
    $db = new Database();
    if( isset($_POST['kirim']) ) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenkel = $_POST['jenkel'];
        $jurusan = $_POST['jurusan'];
        
        $cek = $db->conn->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
        if(mysqli_num_rows($cek) != 1){
            $db->inputData($nim, $nama, $jenkel, $jurusan);
            header("Location: index.php");
        } else {
            echo "<script>
                    alert('NIM Sudah ada');
                    window.location = tambah.php
                  </script>";
        }
        
        



    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <a href="index.php">Kembali</a>

    <table>
        <form action="" method="post">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" required=""></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required=""></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenkel" id="jenkel">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="kirim"></td>
            </tr>
        </form>
    </table>

</body>