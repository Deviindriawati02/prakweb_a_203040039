<!-- 
  inheritence adalah suatu konsep yang akan menciptakan hierarki antar kelas yang dimana nanti akan ada parent dan child.
  child class nantinya akan mewarisi properti dan method yang dimiliki oleh parentnya dengan syarat visible.
  Child parent dibuat untuk memperluas/extend functionalitas parentnya 
  
  kenapa butuh inheritence ?
 -->
 <?php



class Produk
{
  public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jmlHalaman,
    $jmMain;

  public function __construct(
    $judul = "judul",
    $penulis = "penulis",
    $penerbit = "penerbit",
    $harga = 0,
    $jmlHalaman = 0,
    $jmMain = 0
  ) { //alasan pakai _ _ karena bagian dari magic method yang ada di php 
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlHalaman = $jmlHalaman;
    $this->jmMain = $jmMain;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk()
  {
    // komik : Masashi, Shonen Jump -.- 100 halaman 
    $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} |(Rp.{$this->harga})";

    return $str;
  }
}

class komik extends produk
{
  public function getInfoProduk()
  {
    $str = "komik : {$this->judul} | {$this->getLabel()} |(Rp.{$this->harga}) - {$this->jmlHalaman} Halaman.";
    return $str;
  }
}

class game extends produk
{
  public function getInfoProduk()
  {
    $str = "game : {$this->judul} | {$this->getLabel()} |(Rp.{$this->harga}) - {$this->jmMain} Jam.";
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
$produk1 = new komik("Naruto", "Masashi", "Shonen Jump", 30000, 100, 0);
$produk2 = new game("Uncharted", "Neil Durkmann", "Sony Computer", 25000, 0, 50);

// komik : Masashi, Shonen Jump
// game : Neil Durkmann, Sony Computer
// Naruto | Masashi, Shonen Jump | (Rp.30000)

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

?>