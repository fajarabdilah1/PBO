<?php
declare(strict_types=1);
require_once __DIR__ . '/Mahasiswa.php';
require_once __DIR__ . '/MahasiswaReguler.php';
require_once __DIR__ . '/MahasiswaBeasiswa.php';
// ------------------------------

/** Repository sederhana; menyimpan object di array berdasarkan NIM. */
final class DataMahasiswa
{
    /** @var array<string, Mahasiswa> */
    private array $data = [];

    /** @param array<string, Mahasiswa> $dataAwal */
    public function __construct(array $dataAwal = [])
    {
        foreach ($dataAwal as $item) {
            if ($item instanceof Mahasiswa) {
                $this->data[$item->getNim()] = $item;
            }
        }
    }

    /** @return array<string, Mahasiswa> */
    public function semua(): array { return $this->data; }

    public function cari(string $nim): ?Mahasiswa { return $this->data[$nim] ?? null; }

    // --- FITUR PENCARIAN (Berdasarkan NIM atau Nama) ---
    public function cariKeyword(string $keyword): array
    {
        $keyword = trim($keyword);
        if ($keyword === '') return $this->data;
        return array_filter($this->data, function (Mahasiswa $m) use ($keyword) {
            return stripos($m->getNim(), $keyword) !== false || stripos($m->getNama(), $keyword) !== false;
        });
    }

    public function tambah(Mahasiswa $mahasiswa): bool
    {
        $nim = $mahasiswa->getNim();
        if (isset($this->data[$nim])) return false;
        $this->data[$nim] = $mahasiswa;
        return true;
    }

    public function ubah(string $nim, Mahasiswa $mahasiswa): bool
    {
        if (!isset($this->data[$nim]) || $nim !== $mahasiswa->getNim()) return false;
        $this->data[$nim] = $mahasiswa;
        return true;
    }

    public function hapus(string $nim): bool
    {
        if (!isset($this->data[$nim])) return false;
        unset($this->data[$nim]);
        return true;
    }
}