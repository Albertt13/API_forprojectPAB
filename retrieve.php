<?php
    require("koneksi.php");
    
    $perintah = "SELECT * FROM tbl_club";
    $eksekusi = mysqli_query($connect, $perintah);
    
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] = array(); 
        //data akan menjadi JSON array, sedangkan kode dan pesan akan menjadi JSON object
        
        while($get = mysqli_fetch_object($eksekusi)) {
            $var["id"] = $get->id;
            $var["nama"] = $get->nama;
            $var["julukan"] = $get->julukan;
            $var["tahun_berdiri"] = $get->tahun_berdiri;
            $var["sejarah"] = $get->sejarah;
            $var["pemilik"] = $get->pemilik;
            $var["title"] = $get->title;
            $var["foto"] = $get->foto;
            
            array_push($response["data"], $var); 
        }
    }
    else {
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }
    
    echo json_encode($response);
    mysqli_close($connect); //Penutup
?>