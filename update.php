<?php
    require("koneksi.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $julukan = $_POST["julukan"];
        $tahun_berdiri = $_POST["tahun_berdiri"];
        $sejarah = $_POST["sejarah"];
        $pemilik = $_POST["pemilik"];
        $title = $_POST["title"];
        $foto = $_POST["foto"];
        
        $perintah = "UPDATE tbl_club SET nama = '$nama', julukan = '$julukan', tahun_berdiri = '$tahun_berdiri', sejarah = '$sejarah', pemilik = '$pemilik', title = '$title', foto = '$foto' WHERE id = '$id'";
        
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