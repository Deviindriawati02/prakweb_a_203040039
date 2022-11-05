<?php
require 'php/function.php';

// koneksi ke DB & pilih Database
$conn = mysqli_connect('localhost', 'root', '', 'prakweb_a_203040039_pw');

// Query isi tabel mahsiswa 
$result = mysqli_query($conn, "SELECT * FROM buku");

// ubah data ke dalam array 
// $row = mysqli_fetch_row($result); // array numerik
// $row = mysqli_fetch_assoc($result); // array associative
// $row = mysqli_fetch_array($result); // keduanya

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// tampung ke variabel buku
$buku = $rows;

?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Novel</title>
    <!--Import materialize.css-->
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<!-- tabel -->

<body style="background-image: url(img/bg2.jpg); background-size: 15px;">

    <div class="container">
        <h1 class="judul">Daftar Novel</h1>

        <table class="table table-bordered border-primary align-middle clear">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul Buku</th>
                    <th>Penulis Buku</th>
                    <th>Tahun Terbit</th>
                    <th>gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>


            <?php $i = 1; ?>
            <?php foreach ($buku as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['judul_buku']; ?></td>
                    <td><?= $row['penulis']; ?></td>
                    <td><?= $row['tahun_terbit']; ?></td>
                    <td><img src="img/<?= $row['gambar']; ?>" width="100"></td>
                   

                    <td>
                        <button class="tombol-ubah">
                            <div class="update">
                                <a href="./php/ubah.php?id=<?= $row['id']; ?>">Ubah</a>
                            </div>
                        </button>
                        <button class="tombol-hapus">
                            <div class="delete"><a href="./php/hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus Data??')">Hapus</a></div>
                        </button>
                        <button class="tambah">
                            <a href="./php/tambah.php">Tambah Data</a>
                        </button>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
    </div>

</body>

</html>