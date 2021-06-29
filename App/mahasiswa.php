<?php

class Mahasiswa{
    public $nim,
           $nama,
           $jenkel,
           $jurusan;

    function __construct($nim, $nama, $jenkel, $jurusan){
        $this->nim = $nim;
        $this->nama = $nama;
        $this->jenkel = $jenkel;
        $this->jurusan = $jurusan;
    }

    function setNim($nim){
        $this->nim = $nim;
    }

    function setNama($nama){
        $this->nama = $nama;
    }

    function setJenkel($jenkel) {
        $this->jenkel = $jenkel;
    }

    function setJurusan($jurusan) {
        $this->jurusan = $jurusan;
    }

}