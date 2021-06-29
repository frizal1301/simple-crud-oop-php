<?php
require_once 'conn.php';
class Database extends Conn{

    
    // public function __construct(){
    //     $this->conn = new mysqli($this->serverName, $this->username, $this->pass, $this->dbname);

    //     if($this->conn->connect_error){
    //         die("Connection Failed". $conn->connect_error);
    //     }
    // }

    public function tampilData(){
        $sql = "SELECT * FROM mahasiswa";
        $result = mysqli_query($this->conn, $sql);
        $data = [];
    
        while($row = $result->fetch_assoc() ){
            $data[] = $row;
        }

        return $data;
    }
    
    public function inputData($nim, $nama, $jenkel, $jurusan){


        $sql = "INSERT INTO mahasiswa VALUES('','$nim','$nama','$jenkel','$jurusan')";
        $result = $this->conn->query($sql);
        if($result) {
                echo "<script>
                        alert('Data berhasil ditambah');
                        window.location= index.php
                      </script>";
        }


        


    }

    public function hapusData($id) {
        $sql = "DELETE FROM mahasiswa WHERE id = '$id'";

        $result = $this->conn->query($sql);
    }

    public function updateData($id, $nama, $jenkel, $jurusan) {
        $sql = "UPDATE mahasiswa SET nama = '$nama',
                                     jenkel = '$jenkel',
                                     jurusan = '$jurusan'
                                WHERE id = '$id';
        ";

        $result = mysqli_query($this->conn, $sql);
        if(!$result){
            die("Terjadi kesalahan".$this->conn->connect_error);
            
        } else {
            header("Location: index.php");
        }
    }

    public function tampilkanSatuData($id){
        $sql = "SELECT * FROM mahasiswa WHERE id='$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        return $row;
    }
}