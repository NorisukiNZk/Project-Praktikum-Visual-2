<?php include "head-admin.php"; ?>
<h2>Cetak Absensi Harian </h2>
<hr />
<form class="form-horizontal" method="GET" action= "laporan_absen_harian.php?tanggal=['tanggal']" target="_blank">
    <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal Absen</label> 
        <div class="col-sm-3">
            <input type="date" name="tanggal" class="form-control" value="<?php echo date ("Y-m-d"); ?>" maxlength="10" placeholder="Tanggal Absen" required>
        </div> 
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label> <div class="col-sm-6">
            <input type="submit" class="btn btn-sm btn-primary" value="Proses"> <button onclick="history.back();" class="btn btn-sm btn-danger">Batal </button>
        </div>
    </div>
</form>
<?php include "foot.php"; ?>