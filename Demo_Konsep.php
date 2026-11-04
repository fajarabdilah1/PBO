<?php

declare(strict_types=1);

require_once __DIR__ . '/Mahasiswa.php';

define('DEMO_LIFECYCLE', true);
header('Content-Type: text/plain; charset=utf-8');

echo "1. Menjalankan Konstruktor\n";

$m = new Mahasiswa('123', 'Alya', 'Teknik', 'Informatika', 'SMA 1', 3, 'Membaca', 'Islam');
echo $m->ringkasan() . "\n";

echo "\n2. Menjalankan OVERLOADING Atribut\n";

$m->ukuranJaket = 'M';       // __set() karena property tidak dideklarasikan
echo $m->ukuranJaket . "\n"; // __get()
echo isset($m->ukuranJaket) ? "Ada\n" : "Tidak ada\n";
unset($m->ukuranJaket);      // __unset()
echo isset($m->ukuranJaket) ? "Masih ada\n" : "Sudah dihapus\n";

echo "\n3. Menjalankan OVERLOADING METHOD\n";
echo $m->profilSingkat() . "\n"; // __call()

echo "\n4. ENKAPSULASI: membaca data lewat GETTER\n";
echo 'Nama     : ' . $m->getNama() . "\n";
echo 'Semester : ' . $m->getSemester() . "\n";

echo "\n5. ENKAPSULASI: SETTER dengan validasi\n";
$m->setSemester(5);
echo 'setSemester(5)  -> diterima, semester sekarang ' . $m->getSemester() . "\n";

try {
    $m->setSemester(-1);
} catch (InvalidArgumentException $e) {
    echo 'setSemester(-1) -> ditolak: ' . $e->getMessage() . "\n";
}
echo 'Semester tetap ' . $m->getSemester() . " (state tidak berubah)\n";

try {
    $m->setNama('   ');
} catch (InvalidArgumentException $e) {
    echo "setNama('   ')  -> ditolak: " . $e->getMessage() . "\n";
}

echo "\n6. ENKAPSULASI: akses langsung ke property PRIVATE\n";
try {
    $m->semester = -5;
} catch (Error $e) {
    echo 'Tulis $m->semester = -5 -> ' . $e->getMessage() . "\n";
}

try {
    echo $m->nama;
} catch (Error $e) {
    echo 'Baca  $m->nama         -> ' . $e->getMessage() . "\n";
}

echo "\n7. ENKAPSULASI: constructor menolak data tidak valid\n";
try {
    new Mahasiswa('', 'Budi', 'Teknik', 'Informatika', 'SMA 2', 3, '', 'Islam');
} catch (InvalidArgumentException $e) {
    echo 'NIM kosong   -> ditolak: ' . $e->getMessage() . "\n";
}

try {
    new Mahasiswa('456', 'Budi', 'Teknik', 'Informatika', 'SMA 2', 20, '', 'Islam');
} catch (InvalidArgumentException $e) {
    echo 'Semester 20  -> ditolak: ' . $e->getMessage() . "\n";
}

echo 'NIM punya setter? ' . (method_exists($m, 'setNim') ? 'Ya' : 'Tidak (hanya bisa dibaca)') . "\n";

echo "\n8. Menjalankan DESTRUCTOR\n";
echo "Lihat log error PHP setelah unset referensi terakhir.\n";
unset($m); // destructor menulis error_log, bukan menghapus record CRUD