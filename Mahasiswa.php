<?php
declare(strict_types=1);
 
class Mahasiswa
{
    // Semua atribut inti dibuat private agar tidak diakses langsung dari luar class.
    private string $nim;
    private string $nama;
    private string $fakultas;
    private string $prodi;
    private string $asalSekolah;
    private int $semester;
    private string $hobi;
    private string $agama;
    private string $alamat;
 
    public function __construct(
        string $nim,
        string $nama,
        string $fakultas = 'Belum diisi',
        string $prodi = '',
        string $asalSekolah = '',
        int $semester = 1,
        string $hobi = '',
        string $agama = '',
        string $alamat = ''
    ) {
        $nim = trim($nim);
        if ($nim === '') {
            throw new InvalidArgumentException('NIM wajib diisi.');
        }
        $this->nim = $nim; // NIM ditetapkan saat object dibuat dan tidak disediakan setter.
        $this->setNama($nama);
        $this->setFakultas($fakultas);
        $this->setProdi($prodi);
        $this->setAsalSekolah($asalSekolah);
        $this->setSemester($semester);
        $this->setHobi($hobi);
        $this->setAgama($agama);
        $this->setAlamat($alamat);
    }
 
    // Getter untuk membaca atribut.
    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getFakultas(): string { return $this->fakultas; }
    public function getProdi(): string { return $this->prodi; }
    public function getAsalSekolah(): string { return $this->asalSekolah; }
    public function getSemester(): int { return $this->semester; }
    public function getHobi(): string { return $this->hobi; }
    public function getAgama(): string { return $this->agama; }
    public function getAlamat(): string { return $this->alamat; }
 
    // Setter hanya disediakan untuk atribut yang boleh diubah.
    public function setNama(string $nama): void {
        $nama = trim($nama);
        if ($nama === '') throw new InvalidArgumentException('Nama wajib diisi.');
        $this->nama = $nama;
    }
    public function setFakultas(string $fakultas): void {
        $this->fakultas = trim($fakultas) !== '' ? trim($fakultas) : 'Belum diisi';
    }
    public function setProdi(string $prodi): void {
        $prodi = trim($prodi);
        if ($prodi === '') throw new InvalidArgumentException('Program studi wajib diisi.');
        $this->prodi = $prodi;
    }
    public function setAsalSekolah(string $asalSekolah): void {
        $asalSekolah = trim($asalSekolah);
        if ($asalSekolah === '') throw new InvalidArgumentException('Asal sekolah wajib diisi.');
        $this->asalSekolah = $asalSekolah;
    }
    public function setSemester(int $semester): void {
        if ($semester < 1 || $semester > 14) throw new InvalidArgumentException('Semester harus 1–14.');
        $this->semester = $semester;
    }
    public function setHobi(string $hobi): void { $this->hobi = trim($hobi); }
    public function setAgama(string $agama): void {
        $daftarAgama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        if (!in_array($agama, $daftarAgama, true)) throw new InvalidArgumentException('Pilihan agama tidak valid.');
        $this->agama = $agama;
    }
    public function setAlamat(string $alamat): void {
        $alamat = trim($alamat);
        if ($alamat === '') throw new InvalidArgumentException('Alamat wajib diisi.');
        $this->alamat = $alamat;
    }
 
    // Memperbarui data yang boleh diubah; NIM sengaja tidak disertakan.
    public function ubahData(string $nama, string $fakultas, string $prodi,
        string $asalSekolah, int $semester, string $hobi, string $agama, string $alamat): void {
        $this->setNama($nama);
        $this->setFakultas($fakultas);
        $this->setProdi($prodi);
        $this->setAsalSekolah($asalSekolah);
        $this->setSemester($semester);
        $this->setHobi($hobi);
        $this->setAgama($agama);
        $this->setAlamat($alamat);
    }
 
    public function profil(): string {
        return implode(' - ', [$this->nim, $this->nama, $this->fakultas, $this->prodi,
            $this->asalSekolah, 'Semester ' . $this->semester, $this->hobi, $this->agama, $this->alamat]);
    }
 
    public function ringkasan(): string { return $this->nim . ' - ' . $this->nama; }
}