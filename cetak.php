<?php
include "admin/koneksi.inc.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kontak</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Data Kontak</h2>
    
    <?php
    if (isset($_SESSION['success'])) {
        echo "<p style='color:green;text-align:center;'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }

    $sql = "SELECT * FROM kontak ORDER BY id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>No</th><th>ID</th><th>Nama</th><th>Jenis Kelamin</th><th>Email</th><th>Alamat</th><th>Kota</th><th>Pesan</th></tr>";
        
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['Nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jkel']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Kota']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Pesan']) . "</td>";
            echo "</tr>";
            $no++;
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>Belum ada data kontak.</p>";
    }
    ?>
    
    <p style="text-align:center;">
        <a href="kontak.html">← Kembali ke Form Kontak</a>
    </p>
</body>
</html>
