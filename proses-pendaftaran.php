<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum?
if (isset($_POST['daftar'])) {
    $photoPath = null; // Default value if no photo uploaded

    // Handle file upload
    if (isset($_FILES['foto'])) {
        $photo = $_FILES['foto'];

        $allowedTypes = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedTypes)) {
            if ($photo['error'] === UPLOAD_ERR_OK) {
                // Set the upload directory
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Create directory if not exists
                }

                // Generate a unique file name
                $fileName = uniqid() . '_' . basename($photo['name']);
                $photoPath = $uploadDir . $fileName;

                // Move the uploaded file to the destination directory
                if (!move_uploaded_file($photo['tmp_name'], $photoPath)) {
                    echo "Failed to upload photo.";
                    exit;
                }
            } else {
                echo "Error uploading photo: " . $photo['error'];
                exit;
            }
        } else {
            echo "File type not allowed. Only JPG, JPEG, and PNG are accepted.";
            exit;
        }
    }

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // Validate required fields
    if (empty($nama) || empty($alamat) || empty($jk) || empty($agama) || empty($sekolah)) {
        echo "Ada kolom yang masih kosong";
        exit;
    }

    // Save data to the database
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, photo) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);

    mysqli_stmt_bind_param($stmt, "ssssss", $nama, $alamat, $jk, $agama, $sekolah, $photoPath);

    if (mysqli_stmt_execute($stmt)) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
