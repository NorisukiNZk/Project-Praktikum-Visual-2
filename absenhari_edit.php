<?php include "head-admin.php"; ?>
<h2>Proses Absen Harian &raquo; Edit Data</h2>
<hr />
<?php

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM absen_harian WHERE id_absen_harian='$id' ");
if (mysqli_num_rows ($sql) == 0) {
    header("Location: admin-php");

}else{
    $row = mysqli_fetch_assoc($sql);
}
if (isset($_POST['save'])) {
    $tgl_absensi = $_POST['tgl_absensi'];
    $nik         = $_POST['nik'];
    $absensi     = $_POST['absensi'];

$update = mysqli_query($koneksi, "UPDATE absen_harian SET tgl_absensi='$tgl_absensi', nik='$nik', absensi='$absensi' WHERE id_absen_harian='$id'") 
or die(mysqli_error());
if ($update) {
    header ("Location: karyawan_edit.php?id=".$id. "&pesan=sukses");
}else{
    ?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times; </button>Data gagal disimpan, silahkan coba lagi.</div>
    <?php
    }
}

if (isset($_GET['pesan']) =='sukses') {
    ?> <div class="alert alert-success alert-dismissable"><button type= "button" class="close" data-dismiss="alert">&times;</button>Data berhasil disimpan.</div>
    <?php
}
$now = date ("Y-m-d");
?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal Absen</label> 
        <div class="col-sm-2">
            <input type="date" name="tgl_absensi" value="<?php echo $row ['tgl_absensi']; ?>" class="form-control" placeholder="NIK"required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">NIK</label>
        <div class="col-sm-2">
            <select name="nik" class="form-control" >
                <option value=""> Pilih Pegawai </option>
                <?php
                $Que = "SELECT FROM karyawan";
                $myQry = mysqli_query($koneksi, $Que) or die ("Gagal Query karyawan ".mysqli_error ($koneksi));
                while ($list = mysqli_fetch_array($my@ry)) {
                    if ($row['nik'] == $list ['nik']) { // kalo mau data terpilih sesuai data yang di load
                        $cek "selected";
                    } else { $cek=""; }
                    echo "<option value='$list [nik]' $cek> $list [nik] $list [nama] </option>";
                }
                ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Status</label> 
            <div class="col-sm-2">
                <select name="absensi" class="form-control">
                    <option value=""> ---- </option>
                    <option value="Masuk" <?php if ($row['absensi']=='Masuk') echo "selected"; ?>> Masuk</option>
                    <option value="Alpa" <?php if ($row['absensi']=='Alpa') echo "selected"; ?>> Alpa</option>
                    <option value="Izin" <?php if ($row['absensi']=='Izin') echo "selected"; ?>> Izin</option>
                    <option value="Sakit" <?php if ($row['absensi']=='Sakit') echo "selected"; ?>>Sakit</option>
                </select>
            </div>
            <div class="col-sm-3">
                <b>Absen Sekarang :</b> <span class="label label-info"><?php echo $row['absensi']; ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                <a href="index.php" class="btn btn-sm btn-danger">Batal</a> </div>
            </div>
        </form>

<?php include "foot.php"; ?>