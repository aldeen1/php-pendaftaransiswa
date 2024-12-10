<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <style>
        body, html{
            font-family: "Signika", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings:
                "GRAD" 0;
            width: 100%;
            height: 100vh;
            margin: 0;
        }
        .table-container{
            display:flex;
            justify-content: center;
            width: 100%;
            align-items: center;
        }
        img {
            width: 100px; /* Adjust the size of the image as needed */
            height: auto;
        }
        .download-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>
    
    <div class="table-container">
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Foto</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
    
                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);
                $no = 1;

                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";
    
                    echo "<td>".$no++."</td>";
                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>".$siswa['sekolah_asal']."</td>";

                    // Display the photo if it exists
                    if (!empty($siswa['photo'])) {
                        echo "<td><img src='".$siswa['photo']."' alt='Foto Siswa'></td>";
                    } else {
                        echo "<td>No Photo</td>";
                    }
    
                    echo "<td>";
                    echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
                    echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
                    echo "</td>";
    
                    echo "</tr>";
                }
                ?>
    
            </tbody>
        </table>
    </div>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    <!-- Add a button for PDF download -->
    <div class="download-button">
        <form action="generate-pdf.php" method="POST" target="_blank">
            <button type="submit">Download PDF</button>
        </form>
    </div>

</body>
</html>
