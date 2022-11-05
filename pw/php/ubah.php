<?php

require 'function.php';

$id = $_GET['id'];
$tp = query("SELECT * FROM buku WHERE id = $id")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil diubah');
                document.location.href = '../index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal diubah');
                document.location.href = '../index.php';
            </script>";
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

<body style="background-image: url(../img/slider/buku2.jpg); background-size: 512px;">
    <section id="tambah" class="tambah">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col offset-m3 s6">
                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $tp['id']; ?>">
                        <div class="card-panel m3 s6">
                            <h5 style="text-align: center;">Form Ubah Data</h5>

                            <div class="input-field">
                                <input type="text" name="judul_buku" id="judul_buku" required value="<?= $tp['judul_buku']; ?>">
                                <label for="judul_buku" class="active">Judul Buku</label>
                            </div><br>
                            <div class="input-field">
                                <input type="text" name="penulis" id="penulis" required value="<?= $tp['penulis']; ?>">
                                <label for="penulis" class="active">Penulis</label>
                            </div><br>
                            <div class="input-field">
                                <input type="text" name="tahun_terbit" id="tahun_terbit" required value="<?= $tp['tahun_terbit']; ?>">
                                <label for="tahun_terbit" class="active">Tahun_terbit</label>
                            </div><br>
                            <div class="input-field">
                                <input type="text" name="gambar" id="gambar" required value="<?= $tp['gambar']; ?>">
                                <label for="gambar" class="active">Foto</label>
                            </div><br>


                            <button type="submit" name="ubah">Ubah Data!</button>
                            <button type="submit">
                                <a href="../index.php" style="text-decoration: none; color: black;">Kembali</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>