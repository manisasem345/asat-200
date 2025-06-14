<?php
include 'konekdb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $tantang = $_POST['tantang'];
    $profesi = $_POST['profesi'];
    $deskripsi_profesi = $_POST['deskripsi_profesi'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $website = $_POST['website'];
    $gelar = $_POST['gelar'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $kota = $_POST['kota'];
    $freelance = isset($_POST['freelance']) ? $_POST['freelance'] : 0;
    $keterangan_about = $_POST['keterangan_about'];
    $keterangan_skill = $_POST['keterangan_skill'];
    $skill = $_POST['skill'];
    
    $url_hero = '';
    $url_foto = '';
    $upload_dir = "uploads/";
    

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    

    if (isset($_FILES['url_hero']) && $_FILES['url_hero']['error'] == 0) {
        $hero_filename = 'hero_' . time() . '_' . $_FILES['url_hero']['name'];
        $hero_target = $upload_dir . $hero_filename;
        
 
        $check = getimagesize($_FILES['url_hero']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['url_hero']['tmp_name'], $hero_target)) {
                $url_hero = $hero_target;
            }
        }
    }
    

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto_filename = 'foto_' . time() . '_' . $_FILES['foto']['name'];
        $foto_target = $upload_dir . $foto_filename;
        
    
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto_target)) {
                $url_foto = $foto_target;
            }
        }
    }
    

    $tgl_lahir = !empty($tgl_lahir) ? "'$tgl_lahir'" : "NULL";
    
    $sql = "INSERT INTO biodata (
        nama_depan, nama_belakang, tantang, profesi, deskripsi_profesi, 
        tgl_lahir, website, gelar, hp, email, kota, freelance, 
        keterangan_about, keterangan_skill, skill, url_hero, url_foto
    ) VALUES (
        '$nama_depan', '$nama_belakang', '$tantang', '$profesi', '$deskripsi_profesi',
        $tgl_lahir, '$website', '$gelar', '$hp', '$email', '$kota', $freelance,
        '$keterangan_about', '$keterangan_skill', '$skill', '$url_hero', '$url_foto'
    )";
    
    // Execute query
    if ($conn->query($sql) === TRUE) {
        header("Location: forms_biodata.html?pesan=sukses");
        exit();
    } else {
        header("Location: form_biodata.php?pesan=error");
        exit();
    }
} else {
    header("Location: form_biodata.php");
    exit();
}

$conn->close();
?>