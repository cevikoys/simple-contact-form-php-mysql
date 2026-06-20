<?php
include "admin/koneksi.inc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Amankan input
    $id     = $conn->real_escape_string($_POST['id']);
    $nama   = $conn->real_escape_string($_POST['nama']);
    $jkel   = $conn->real_escape_string($_POST['jkel']);
    $email  = $conn->real_escape_string($_POST['email']);
    $alamat = $conn->real_escape_string($_POST['alamat']);
    $kota   = $conn->real_escape_string($_POST['kota']);
    $pesan  = $conn->real_escape_string($_POST['pesan']);

    $sql = "INSERT INTO kontak (id, Nama, jkel, Email, Alamat, Kota, Pesan) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $id, $nama, $jkel, $email, $alamat, $kota, $pesan);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Data kontak berhasil disimpan!";
        header("Location: cetak.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("Location: kontak.html");
}
?>
