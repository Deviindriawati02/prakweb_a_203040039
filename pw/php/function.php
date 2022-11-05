<?php
// fungsi untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "prakweb_a_203040039_pw");

    return $conn;
}

// function untuk melakukan query dan memasukannya kedalam array
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



// function untuk menambah data produk
function tambah($data)
{
    $conn = koneksi();

    $judul_buku = htmlspecialchars($data['judul_buku']);
    $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
    $gambar = htmlspecialchars($data['gambar']);
    $penulis = htmlspecialchars($data['penulis']);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO buku 
                VALUES
                (NULL, 
                '$judul_buku', 
                '$penulis', 
                '$tahun_terbit',
                '$gambar'
                )";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

// function untuk menghapus data produk
function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}


// function untuk mengubah data produk
function ubah($data)
{
    $conn = koneksi();
    $id = $data["id"];
    $judul_buku = htmlspecialchars($data["judul_buku"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $gambar = htmlspecialchars($data["gambar"]);
    
   
    $query = "UPDATE buku
                SET 
                judul_buku= '$judul_buku',
                gambar = '$gambar',
                penulis = '$penulis',
                tahun_terbit = $tahun_terbit
                WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}