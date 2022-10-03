<!-- 
  Visibility adalah sebuah konsep yang digunakan untuk mengatur akses terhadap properti terhadap sebuah property dan object
  jenis: public , protected,private
  public = properti/method dapat digunakan dimanasaja bahkan diluar kelas 
  protected = hanya bisa digunakan dalam sebuah kelas dan turunannya 
  private = hanya dapat digunakan dalam kelas tertentu saja 
  alasan menggunakan visibility 
  1.hanya memperlihatkan kelas yang dibutuhkan oleh clientnya saja 
  2.dapat menentukan kebutuhan yang jelas untuk suatu objek 
  3.memberikan kendali untuk menghiindari bug
 -->
 <?php

class Produk
{
  public $judul,
    $penulis,
    $penerbit;

  protected $diskon;

  private $harga;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) //alasan pakai _ _ karena bagian dari magic method yang ada di php 
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  public function getHarga()
  {
    return $this->harga - ($this->harga * $this->diskon / 100);
  }



  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk()
  {
    // komik : Masashi, Shonen Jump -.- 100 halaman 
    $str = "{$this->judul} | {$this->getLabel()} |(Rp.{$this->harga})";

    return $str;
  }
}

class komik extends produk
{
  public $jmlHalaman;

  public function __construct(
    $judul = "judul",
    $penulis = "penulis",
    $penerbit = "penerbit",
    $harga = 0,
    $jmlHalaman = 0
  ) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfoProduk()
  {
    $str = "komik : " . parent::getInfoProduk() . "  - {$this->jmlHalaman} Halaman.";
    return $str;
  }
}

class game extends produk
{
  public $jmMain;

  public function __construct(
    $judul = "judul",
    $penulis = "penulis",
    $penerbit = "penerbit",
    $harga = 0,
    $jmMain = 0
  ) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jmlHalaman = $jmMain;
  }

  public function setDiskon($diskon)
  {
    $this->diskon = $diskon;
  }


  public function getInfoProduk()
  {
    $str = "game :  " . parent::getInfoProduk() . " ~ {$this->jmMain} Jam.";
    return $str;
  }
}


class cetakInfoProduk
{
  public function cetak(produk $produk)
  {
    $str = "{$produk->judul} | {$produk->getLabel()} | (Rp.{$produk->harga})";
    return $str;
  }
}
$produk1 = new komik("Naruto", "Masashi", "Shonen Jump", 30000, 100);
$produk2 = new game("Uncharted", "Neil Durkmann", "Sony Computer", 250000, 50);

// komik : Masashi, Shonen Jump
// game : Neil Durkmann, Sony Computer
// Naruto | Masashi, Shonen Jump | (Rp.30000)

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);

echo $produk2->getHarga();


?>