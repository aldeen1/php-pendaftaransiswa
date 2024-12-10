<!DOCTYPE html>
<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto:wght@300;400&family=Signika:wght@300..700&display=swap" rel="stylesheet">
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
            nav ul{
                display:flex;
                justify-content: space-between;
            }
            nav{
                margin-right: 2em;
            }

            h1{
                font-weight: 400;
                margin: 0;
            }
            li{
                list-style-type: none;
                
            }

            a{
                text-decoration: none;
                color: black;
            }

            .button-container{
                display:flex;
                justify-content: center;
                gap: 1em;
            }

            .hero-container{
                display:flex;
                justify-content: center;
                gap: 2em;
                align-items: center;
                width: 100%;
            }
            .left{
                display:flex;
                justify-content: end;
                flex-direction: column;
                align-items: center;
                margin:0;
            }

            .right{
                width: 45%;
            }
        </style>
    </head>

    <body>
        <nav>
            <ul>
                <li>Pendaftaran Siswa Baru</li>
                <div class="button-container">
                    <li><a href="./index.php">Home</a></li>
                </div>
                <div class="register">
                    <li><a href="./form-daftar.php">Daftar</a></li>
                </div>
            </ul>
        </nav>

        <div class="hero-container">
            <div class="left">
                <h1>Raih cita cita mu</h1>
                <h2>Daftar sekarang</h2>
                <button><a href="./form-daftar.php">Daftar</a></button>
                <button><a href="./form-login.php">Login</a></button>
            </div>
            <div class="right">
                <img src="./src/—Pngtree—education language learning online on_15006336.png" alt="" width="100%">
            </div>
        </div>

    </body>
</html>