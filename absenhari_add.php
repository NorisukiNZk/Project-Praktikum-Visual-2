<?php include "head-admin.php"; ?>
<h2>Proses Absensi Harian &raquo; Tambah Data</h2>
<hr />
<?php

if (isset($_POST['add'])){
        $tgl_absensi    = $_POST['tgl_absensi'];
        $nik            = $_POST['nik'];
        $absensi        = $_POST['absensi'];

$cek = mysqli_query($koneksi, "SELECT absen_harian.id_absen_harian, absen_harian.tgl_absensi, absen_harian.nik, absen_harian.absensi FROM absen_harian WHERE nik='$nik' AND tgl_absensi='$tgl_absensi'") 
or die ("Eror Query ".mysqli_error($koneksi)); ;
$jmlcek = mysqli_num_rows($cek);
if ($jmlcek==0) {
    $insert = mysqli_query($koneksi, "INSERT INTO absen_harian (tgl_absensi, nik, absensi)
    VALUES ('$tgl_absensi', '$nik', '$absensi')") or die(mysqli_error ($koneksi ));
    if ($insert) {
        ?> <div class="alert alert-success alert-dismissable"> <button type= "button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>Proses Absensi Harian Berhasil Di Simpan. <a href= "absenhari_data.php"> kembali ke halaman Absen Harian </a></div>
        <?php
        }else {
        ?> <div class="alert alert-danger alert-dismissable"><button type= "button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>Ups, Proses Absensi Harian Gagal Di simpan !</div>
        <?php
        }

    }else {
        ?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Absen Sudah Ada..!</div>
        <?php
    }
}
$now = date("Y-m-d");
?>

<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal Absen</label> 
        <div class="col-sm-3">
            <input type="date" name="tgl_absensi" class="form-control" value="<?php echo $now; ?>" maxlength="10" placeholder="Tanggal Absen" readonly required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">NIK</label>
        <div class="col-sm-3">
            <select name="nik" class="form-control" >
                <?php
                $Que = "SELECT karyawan.* FROM karyawan LEFT JOIN absen_harian ON absen_harian.nik=karyawan.nik WHERE karyawan.nik NOT IN (SELECT nik from absen_harian WHERE absen_harian.tgl_absensi='$now') GROUP BY karyawan.nik";
                $myQry = mysqli_query($koneksi, $Que) or die ("Gagal Query karyawan ". mysqli_error($koneksi));
                while ($list = mysqli_fetch_array($myQry)) {
                    if ($data == $list['nik']) { // kalo mau data terpilih sesuai data yang di load
                        $cek = "selected";
                        } else { $cek=""; }
                        echo "<option value='$list[nik]' $cek> $list[nik] $list[nama] 
                        </option>";
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Keterangan Absensi</label> 
                <div class="col-sm-3">
                    <select name="absensi" class="form-control"> 
                        <option value=""> ----- </option> 
                        <option value="Masuk">Masuk</option> 
                        <option value="Alpa">Alpa</option> 
                        <option value="Izin">Izin</option> 
                        <option value="Sakit">Sakit</option> 
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label> 
            <div class="col-sm-6">
                <input type="submit" name="add" class="btn btn-sm btn-primary" value= "Simpan">
                <a href="absenhari_data.php" class="btn btn-sm btn-danger">Batal</a> </div>
            </div>
        </form>
<?php include "foot.php"; ?>