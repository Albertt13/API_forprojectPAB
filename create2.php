<?php
    require("koneksi.php");
    
    $response = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $lokasi = $_POST["lokasi"];
        $tahun_berdiri = $_POST["tahun_berdiri"];
        $kapasitas = $_POST["kapasitas"];
        $foto = $_POST["foto"];
        
        $perintah = "INSERT INTO tbl_stadion (nama, lokasi, tahun_berdiri, kapasitas, foto) VALUES ('$nama', '$lokasi', '$tahun_berdiri', '$kapasitas' , '$foto')";
        
        $eksekusi = mysqli_query($connect, $perintah);
        $cek = mysqli_affected_rows($connect);
        
        if($cek > 0) {
            $response["kode"] = 1;
            $response["pesan"] = "Sukses Menyimpan Data!";
        }
        else {
            $response["kode"] = 0;
            $response["pesan"] = "Ada Kesalahan, Gagal Menyimpan Data";
        }
    }
    else {
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data!";
    }
    
    echo json_encode($response);
    mysqli_close($connect);
?>