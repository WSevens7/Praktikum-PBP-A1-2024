<?php
//Nama : ADIB WILLY KUSUMA ADRIGANTARA
//NIM : 24060122140158
//Kelas : A1

// Include file untuk koneksi database
require_once 'lib/db_login.php';

// Mendapatkan race_id dari parameter GET
$race_id = isset($_GET['race_id']) ? intval($_GET['race_id']) : 0;

if ($race_id > 0) {
    // Query untuk mendapatkan data classes berdasarkan race_id
    $query = "SELECT class_id, class_name FROM tb_classes WHERE race_id = $race_id";
    $result = $db->query($query);

    // Mengecek apakah ada hasil
    if ($result) {
        $classes = array();
        while ($row = $result->fetch_assoc()) {
            $classes[] = $row;
        }
        // Mengirimkan data dalam format JSON
        echo json_encode($classes);
    } else {
        // Menampilkan error jika query gagal
        echo json_encode(array('error' => 'Gagal mendapatkan data classes.'));
    }
} else {
    // Jika race_id tidak valid
    echo json_encode(array('error' => 'Race ID tidak valid.'));
}

// Menutup koneksi database
$db->close();
?>