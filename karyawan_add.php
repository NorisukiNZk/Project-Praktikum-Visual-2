<?php include "head-admin.php"; ?>
<?php
if (isset($_POST['add'])) {
    $nik                = $_POST['nik'];
    $nama               = $_POST['nama'];
    $tempat_lahir       = $_POST['tempat_lahir'];    
    $tanggal_lahir      = $_POST['tanggal_lahir'];
    $alamat             = $_POST['alamat'];
    $no_telepon         = $_POST['no_telepon'];
    $jabatan            = $_POST['jabatan'];
    $status             = $_POST['status'];

    $cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
    if (mysqli_num_rows($cek) == 0) {
        
        $insert = mysqli_query($koneksi, "INSERT INTO karyawan (nik, nama, tempat_lahir, tanggal_lahir, alamat, no_telepon, jabatan, status)
        VALUES ('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telepon', '$jabatan', '$status') ") or die(mysqli_error ($koneksi)); 
        if ($insert) {
            ?> <div class="alert alert-success alert-dismissable"><button type= "button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>Data Karyawan Berhasil Di Simpan. </div>
            <meta http-equiv= 'refresh' content='2; url=karyawan_data.php'> 
            <?php 

            }else {
                ?> <div class="alert alert-danger alert-dismissable"><button type= "button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>Ups, Data Karyawan Gagal Di simpan !</div>
                <?php
                }
            } else {
                ?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Sudah Ada..!</div>
                <?php
            }
        }
        $now = strtotime (date ("Y-m-d"));
        $maxage = date('Y-m-d', strtotime('- 16 year', $now)); 
        $minage = date('Y-m-d', strtotime('- 40 year', $now));

?>
<form class="form-horizontal" action="" method="post">
<h2 class="container">Data Karyawan &raquo; Tambah Data</h2> 
<hr />
    <div class="form-group">
        <label class="col-sm-3 control-label">NIK</label> <div class="col-sm-2">
            <input type="text" name="nik" class="form-control" maxlength="10" placeholder="NIK" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nama</label>
        <div class="col-sm-4">
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tempat Lahir</label>
        <div class="col-sm-4">
            <input type="text" name="tempat_lahir" class="form-control" placeholder= "Tempat Lahir" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal Lahir</label>
        <div class="col-sm-4">
            <input type="date" name="tanggal_lahir" value="" min="<?php echo $minage; ?> " max="<?php echo $maxage; ?>" class="input-group form-control" required> </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-3">
                <textarea name="alamat" class="form-control" placeholder="Alamat" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">No Telepon</label>
            <div class="col-sm-3">
                <input type="text" name="no_telepon" maxlength="12" class= "form-control" placeholder="No Telepon" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Jabatan</label> <div class="col-sm-2">
                <select name="jabatan" class="form-control" required> <option value=""> </option>
                <option value="Operator">Operator</option>
                <option value="Leader">Leader</option>
                <option value="Supervisor">Supervisor</option> <option value="Manager">Manager</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Status</label> <div class="col-sm-2">
            <select name="status" class="form-control">
                <option value=""> </option>
                <option value="Outsourcing">Outsourcing</option> <option value="Kontrak">Kontrak</option>
                <option value="Tetap">Tetap</option> </select>
            </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
            <input type="submit" name="add" class="btn btn-sm btn-primary" value= "Simpan">
            <a href="index.php" class="btn btn-sm btn-danger">Batal</a>
        </div>
    </div>
</form>

<?php include "foot.php"; ?>