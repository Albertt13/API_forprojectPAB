<?php
    require("koneksi.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $lokasi = $_POST["lokasi"];
        $tahun_berdiri = $_POST["tahun_berdiri"];
        $kapasitas = $_POST["kapasitas"];
        $foto = $_POST["foto"];
        
        $perintah = "UPDATE tbl_stadion SET nama = '$nama', lokasi = '$lokasi', tahun_berdiri = '$tahun_berdiri', kapasitas = '$kapasitas', foto = '$foto' WHERE id = '$id'";
        
        $eksekusi = mysqli_query($connect, $perintah);
        $cek = mysqli_affected_rows($connect);
        
        if($cek > 0) {
            $response["kode"] = 1;
            $response["pesan"] = "Sukses Mengubah Data!";
        }
        else {
            $response["kode"] = 0;
            $response["pesan"] = "Ada Kesalahan, Gagal Mengubah Data";
        }
    }
    else {
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data!";
    }
    
    echo json_encode($response);
    mysqli_close($connect);
?>