<?php
include ("koneksi.php");
include ("library.php");
include ("seslogin.php");
?>
<head>
    <title>Admin Praktikum Pemrograman Web</title> 
    <link href="css/site.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header">
            </div>
            <nav class="navbar navbar-inverse ">
                <div id="navbar" >
                    <ul class="dropDownMenu">
                        <li><a href="admin.php">Beranda</a> </li>
                        <li><a href="#">Master Data</a>
                        <ul>
                            <li><a href="karyawan_data.php">Karyawan Data</a></li>
                        </ul> 
                    </li>
                    <li><a href="#">Proses Data</a>
                    <ul>
                        <li><a href="absenhari_data.php">Absensi Harian</a></li>
                        <!-- <li><a href="#">Absensi Bulanan</a></li> 
                        <li><a href="#">Penggajian </a></li>
                    -->
                </ul> 
            </li>
            <li> <a href="#" > Laporan</a>
            <ul>
                <li> <a href="karyawan_cetak.php">Cetak Data Karyawan</a></li> 
                <li> <a href="cetak_absenharian.php">Cetak Absen Harian</a></li>
                <ul>
                     </li>
                    </ul>
                </div>
                <div id="navbarright">
                    <ul class="dropDownMenu">
                        <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="content">
        </div>
    </div>