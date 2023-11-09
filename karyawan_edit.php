<?php
include "head-admin.php";
?>
<?php
$nik = $_GET['nik'];
$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
if (mysqli_num_rows($sql) == 0) {
    header("Location: admin.php");
} else {
    $row = mysqli_fetch_assoc($sql);
}
//proses Simpan Data
if (isset($_POST['save'])) {
    $nama           = $_POST['nama'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $alamat         = $_POST['alamat'];
    $no_telepon     = $_POST['no_telepon'];
    $jabatan        = $_POST['jabatan'];
    $status         = $_POST['status'];

    $update = mysqli_query($koneksi, "UPDATE karyawan SET nama='$nama', 
    tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat',
    no_telepon='$no_telepon', jabatan='$jabatan', status='$status' WHERE nik='$nik'"
    );
    if ($update) {
        // header("Location: karyawan_edit.php?nik=".$nik."&pesan=sukses");
        echo "<meta http-equiv='refresh' content='1; url=karyawan_data.php'>";
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">$times;</button>Data 
        Gagal Disimpan, Silahkan Coba Lagi</div>';
    }
}

if (isset($_GET['pesan']) == 'sukses') {
    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
}
$now = strtotime (date ("Y-m-d"));
$maxage = date ('Y-m-d', strtotime('- 16 year', $now)); 
$minage = date ('Y-m-d', strtotime('- 40 year', $now));
?>

<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">NIK</label>
        <div class="col-sm-2">
            <input type="text" name="nik" value="<?php echo $row['nik']; ?>" class="form-control" placeholder="NIK" required readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nama</label>
        <div class="col-sm-4">
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" placeholder="Nama" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tempat Lahir</label>
        <div class="col-sm-4">
            <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir"
                required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal Lahir</label>
        <div class="col-sm-4">
            <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" class="form-control" placeholder="Tanggal Lahir"
                required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Alamat</label>
        <div class="col-sm-3">
            <textarea name="alamat" value="<?php echo $row['alamat']; ?>" class="form-control" placeholder="Alamat"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">No Telepon</label>
        <div class="col-sm-3">
            <input type="text" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" class="form-control" maxlength="12" placeholder="No Telepon" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Jabatan</label>
        <div class="col-sm-2">
            <select name="jabatan" class="form-control" required>
                <option value=""> - Jabatan Terbaru - </option>
                <option value="Operator">Operator</option>
                <option value="Leader">Leader</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Manager">Manager</option>
            </select>
        </div>
        <div class="col-nm-3">
            <b>Jabatan Sekarang :</b>
            <span class="label label-success"> <?php echo $row ['jabatan']; ?></span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Status</label>
        <div class="col-sm-2">
            <select name="status" class="form-control" required>
                <option value=""> -Status Terbaru- </option>
                <option value="Outsourcing">Outsourcing</option>
                <option value="Kontrak">Kontrak</option>
                <option value="Tetap">Tetap</option>
            </select>
        </div>
        <div class="col-nm-3">
            <b>Status Sekarang :</b>
            <span class="label label-success"><?php echo $row ['status']; ?></span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp; </label>
        <div class="col-sm-6">
            <input type="submit" name="save" class="btn btn-sm btn-primary" value= "Simpan">
            <a href="index.php" class="btn btn-sm btn-danger">Batal</a>
        </div>
    </div>
</form>

<?php
include "foot.php";
?>