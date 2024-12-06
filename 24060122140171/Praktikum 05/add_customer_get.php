<!-- 
Nama         : Fikri Azka Pradya
NIM          : 24060122140171
Tanggal      : 1 Oktober 2024
File         : add_customer_get.php
Deskripsi    : Menyimpan inputan form ke basis data dan menampilkan respon berupa konfirmasi hasil query menggunakan method GET
 -->
<?php
    //TODO: Koneksi ke database
    require_once('lib/db_login.php');
    //TODO: Dapatkan nilai inputan form
    $name = $db->real_escape_string($_GET['name']);
    $address = $db->real_escape_string($_GET['address']);
    $city = $db->real_escape_string($_GET['city']);
    //TODO: Buat dan eksekusi query
    $query = "INSERT INTO customers (name, address, city) VALUES ('".$name."','".$address."','".$city."' )";
    $result = $db->query($query);
    if (!$result) {
        echo '<div class="alert alert-danger alert-dismissible">
        <strong>Error!</strong> Could not query the database<br>'.
        $db->error.'<br>query = ',$query.
        '</div>';
    } else {
        //TODO: Tampilkan alert berupa data dengan GET
        echo '<div class="alert alert-success alert-dismissibile">
        <strong>Success!</strong> Data has been added. <br>
        Name: '.$_GET['name'].'<br>
        Address: '.$_GET['address'].'<br>
        city: '.$_GET['city'].'<br>
        </div>';
    }
    // TODO: Tutup koneksi database
    $db->close();
?>