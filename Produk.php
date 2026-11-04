<?php
class Produk {
    public $nama = "Sepatu";
    protected $kategori = "Fashion";
    private $harga = 600000;
 
    public function getHarga() {
        return $this->harga;
    }
}
 
class ProdukDigital extends Produk {
    public function getKategori() {
        return $this->kategori; // protected dapat diakses oleh subclass
    }
}
 
$produk = new Produk();
echo $produk->nama . "<br>";       // public: dapat diakses dari luar
// echo $produk->kategori;          // error: protected tidak dapat diakses dari luar
// echo $produk->harga;             // error: private tidak dapat diakses dari luar
 
$digital = new ProdukDigital();
echo $digital->getKategori() . "<br>";
echo $produk->getHarga();
?>
