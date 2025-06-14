<?php
include 'konekdb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $deskripsi_kontak = $_POST['deskripsi_kontak'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    
    
    if (empty($deskripsi_kontak) || empty($alamat) || empty($kota)) {
        header("Location: forms_contact.html?pesan=empty");
        exit();
    }
    

    $deskripsi_kontak = $conn->real_escape_string($deskripsi_kontak);
    $alamat = $conn->real_escape_string($alamat);
    $kota = $conn->real_escape_string($kota);
    

    $sql = "INSERT INTO kontak (deskripsi_kontak, alamat, kota) 
            VALUES ('$deskripsi_kontak', '$alamat', '$kota')";
    
  
    if ($conn->query($sql) === TRUE) {
  
        header("Location: forms_contact.html?pesan=sukses");
        exit();
    } else {
  
        header("Location: forms_contact.html?pesan=error");
        exit();
    }
    
} else {

    header("Location: forms_contact.html");
    exit();
}


$conn->close();
?>