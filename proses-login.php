<?php

include("config.php");

if(isset($_POST["login"])){
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    $sql = "SELECT nama, alamat, 'calon_siswa' AS user_type
    FROM calon_siswa
    WHERE nama = 'input_nama' AND alamat = 'input_alamat'
    UNION
    SELECT nama, alamat, 'pegawai' AS user_type
    FROM pegawai
    WHERE nama = 'input_nama' AND alamat = 'input_alamat';
    ";

    $result = mysqli_query($db,$sql);
    $user = mysqli_fetch_assoc($result);
    
    if($user){
        if($user['user_type'] == 'calon_siswa'){
            header('Location: index.php');
        }else if($user['user_type'] == 'pegawai'){
            header('Location: list-siswa.php');
        }
    }else{
        echo "Invalid input";
    }
}


?>