<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Diagram UML Mahasiswa</title>

<style>
    body {
        background: #141107;
        color: #0e0eff;
        font-family: "Times New Roman", serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    svg {
        width: 100%;
        max-width: 1000px;
        height: auto;
    }

    .box {
        fill: #7c5815cf;
        stroke: #bfc0c8;
        stroke-width: 1.5;
    }

    .line {
        stroke: #cc0000;
        stroke-width: 1.5;
        fill: none;
    }

    .text {
        fill: #fefdfdb1;
        font-size: 18px;
        text-anchor: middle;
    }

    .title {
        font-size: 21px;
        font-weight: bold;
    }

    .separator {
        stroke: #bfc0c8;
        stroke-width: 1;
    }
</style>
</head>

<body>

<svg viewBox="0 0 1000 700"
     xmlns="http://www.w3.org/2000/svg">

    <!-- KELAS INDUK -->
    <rect class="box" x="270" y="25"
          width="460" height="255"/>

    <text class="text title" x="500" y="55">
        Mahasiswa (abstract)
    </text>

    <line class="separator" x1="270" y1="70"
          x2="730" y2="70"/>

    <text class="text" x="500" y="100">
        - nim : string
    </text>

    <text class="text" x="500" y="125">
        - nama : string
    </text>

    <text class="text" x="500" y="150">
        - prodi : string
    </text>

    <text class="text" x="500" y="175">
        - semester : int
    </text>

    <line class="separator" x1="270" y1="190"
          x2="730" y2="190"/>

    <text class="text" x="500" y="215">
        + getNim() : int
    </text>

    <text class="text" x="500" y="240">
        + getNama() : string
    </text>

    <text class="text" x="500" y="265">
        + getProdi() : string
    </text>

    <!-- METODE TAMBAHAN -->
    <text class="text" x="500" y="305">
        + getSemester() : int
    </text>

    <text class="text" x="500" y="330">
        + hitungBiaya() : int (abstract)
    </text>

    <text class="text" x="500" y="355">
        + getJenis() : string (abstract)
    </text>

    <!-- GARIS PEWARISAN -->
    <path class="line"
          d="M500 370 V410 H250 V450"/>

    <path class="line"
          d="M500 410 H750 V450"/>

    <!-- SEGITIGA GENERALISASI -->
    <path d="M500 370 L490 390 L510 390 Z"
          fill="#d00606"
          stroke="#fa0000"
          stroke-width="1.5"/>

    <!-- KELAS MAHASISWA REGULER -->
    <rect class="box" x="60" y="450"
          width="380" height="210"/>

    <text class="text title" x="250" y="480">
        MahasiswaReguler
    </text>

    <text class="text" x="250" y="505">
        extends Mahasiswa
    </text>

    <line class="separator" x1="60" y1="520"
          x2="440" y2="520"/>

    <text class="text" x="250" y="550">
        - ukt : int
    </text>

    <line class="separator" x1="60" y1="565"
          x2="440" y2="565"/>

    <text class="text" x="250" y="590">
        + constructor(...)
    </text>

    <text class="text" x="250" y="615">
        + getUkt() : int
    </text>

    <text class="text" x="250" y="640">
        + hitungBiaya() : int
    </text>

    <!-- KELAS MAHASISWA BEASISWA -->
    <rect class="box" x="560" y="450"
          width="380" height="210"/>

    <text class="text title" x="750" y="480">
        MahasiswaBeasiswa
    </text>

    <text class="text" x="750" y="505">
        extends Mahasiswa
    </text>

    <line class="separator" x1="560" y1="520"
          x2="940" y2="520"/>

    <text class="text" x="750" y="545">
        - ukt : int
    </text>

    <text class="text" x="750" y="570">
        - potonganPersen : int (0-100)
    </text>

    <line class="separator" x1="560" y1="585"
          x2="940" y2="585"/>

    <text class="text" x="750" y="610">
        + constructor(...)
    </text>

    <text class="text" x="750" y="635">
        + getUkt() : int
    </text>

    <text class="text" x="750" y="655">
        + getPotonganPersen() : int
    </text>

    <text class="text" x="750" y="680">
        + hitungBiaya() : int
    </text>

</svg>

</body>
</html>