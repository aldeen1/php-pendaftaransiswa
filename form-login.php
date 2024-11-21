<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </style>
</head>
<body>
    <header>
        <h3>Masukkan nama dan alamat anda</h3>
    </header>

    <form action="form-edit.php" method="POST">
        <fieldset>
            <p>
                <label for="nama"> Nama: </label>
                <input type="text" name="nama" placeholder="Name lengkap">
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"></textarea>
            </p>    
            <p>
                <input type="submit" value="Login">
            </p>
        </fieldset>
    </form>
</body>
</html>