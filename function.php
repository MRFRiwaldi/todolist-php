<?php


require_once __DIR__ . "/koneksi.php";

koneksi();
function ambildata()
{
    $koneksi = koneksi();
    $sql = "SELECT * FROM tugas_rival";
    $result = $koneksi ->query($sql);
    
   return $result;
}

function ambilsatudata($id)
{
    $koneksi = koneksi();
    $sql = "SELECT * FROM tugas_rival WHERE id= $id";
    $result = $koneksi ->query($sql);
    
   return $result;
}

function editData($id, $tugas, $deadline)
{
    $koneksi = koneksi();
    $sql = "UPDATE `tugas_rival` SET `nama_tugas`='$tugas',`deadline`='$deadline' WHERE id = $id";
    $result = $koneksi->exec($sql);

    return $result;
}

function tambahData($tugas, $deadline)
{
    $koneksi = koneksi();
    $sql = "INSERT INTO `tugas_rival`(`nama_tugas`, `deadline`) VALUES ('$tugas','$deadline')";
    $result = $koneksi ->exec($sql);
    
   return $result;
}

function hapusdata($id)
{
    $koneksi = koneksi();
    $sql = "DELETE FROM `tugas_rival` WHERE id = $id";
    $result = $koneksi ->exec($sql);
    
   return $result;
}