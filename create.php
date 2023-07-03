<?php
    require("koneksi.php");
    
    $response = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $julukan = $_POST["julukan"];
        $tahun_berdiri = $_POST["tahun_berdiri"];
        $sejarah = $_POST["sejarah"];
        $pemilik = $_POST["pemilik"];
        $title = $_POST["title"];
        $foto = $_POST["foto"];
        
        $perintah = "INSERT INTO tbl_club (nama, julukan, tahun_berdiri, sejarah, pemilik, title, foto) VALUES ('$nama', '$julukan', '$tahun_berdiri', '$sejarah', '$pemilik', '$title', '$foto')";
        
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