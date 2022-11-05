<?php

require 'function.php';


// cek apakah tombol sudah ditekan atau belum
if (isset($_POST["tambah"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan')
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
    <script>
        alert('data gagal ditambahkan')
        document.location.href = '../index.php';
    </script>
";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="background-image: url(../img/slider/buku.jpg); background-size: 507px;">
    <section id="tambah" class="tambah">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col offset-m3 s6">
                    <form action="" method="POST">
                        <div class="card-panel m3 s6">
                            <h5 style="text-align: center;">Form Tambah Data</h5>

                            <div class="input-field">
                                <input type="text" name="judul_buku" id="judul_buku" required class="validate" autocomplete="off">
                                <label for="judul_buku" class="active">Judul Buku :</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="penulis" id="penulis" required class="validate" autocomplete="off">
                                <label for="penulis" class="active">Penulis :</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="tahun_terbit" id="tahun_terbit" required class="validate" autocomplete="off">
                                <label for="tahun_terbit" class="active">Tahun Terbit :</label>
                            </div>

                            <div class="input-field">
                                <input type="file" name="gambar" id="gambar" required class="validate" autocomplete="off">
                                <label for="gambar" class="active">Gambar :</label>
                            </div>

                            

                            <button type="submit" name="tambah">Tambah Data!</button>
                            <button type="submit">
                                <a href="../index.php" style="text-decoration: none; color: black;">Kembali</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </form>

</body>

</html>




<!-- 
<body style="background-image: url(../assets/slider/tambah.jpg); background-size: 507px;">
    <h1>Form Tambah Data Produk</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama :</label><br>
                <input type="text" name="nama" id="nama" required><br><br>
            </li>
            <li>
                <label for="gambar">Gambar :</label><br>
                <input type="text" name="gambar" id="gambar" required><br><br>
            </li>
            <li>
                <label for="penulis">Penulis :</label><br>
                <input type="text" name="penulis" id="penulis" required><br><br>
            </li>
            <br>
            <button type="submit" name="tambah">Tambah Data!</button>
            <button type="submit">
                <a href="../index.php" style="text-decoration: none; color: black;">Kembali</a>
            </button>
        </ul>
    </form>

</body>

</html> -->