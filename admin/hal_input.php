<?php include 'header.php'; ?>

<h2 class="py-3">Halaman Input Data</h2>

<div class="mb-3 row">
    <a href="halaman.php">Kembali</a>
</div>

<?php
$judul = "";
$kutipan = "";
$isi = "";
$error = "";
$sukses = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql = "SELECT * FROM halaman WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);

    $judul = $result['judul'];
    $kutipan = $result['kutipan'];
    $isi = $result['isi'];

    if ($isi == "") {
        $error = "Data tidak ditemukan";
    }

}

if (isset($_POST['simpan'])) {
    $judul  = $_POST['judul'];
    $kutipan  = $_POST['kutipan'];
    $isi  = $_POST['isi'];
    $tanggal= date("Y-m-d h:i:s");
    
    if ($judul == '' || $isi == '') {
        $error = "Judul dan Isi tidak boleh kosong";
    }

    if (empty($error)) {
        if ($id != "") {
            $sql = "UPDATE halaman 
                        SET 
                        judul = '$judul',
                        kutipan = '$kutipan',
                        isi = '$isi',
                        created_at = now()
                        WHERE
                        id = '$id'
                    ";
            $query = mysqli_query($konek, $sql);
            if($query) {
                $sukses = "Data berhasil diedit";
            } else {
                $error = "Data gagal diedit";
            }
        } else {
            $sql = "INSERT INTO halaman (judul, kutipan, isi, created_at)
                                VALUES 
                                ('$judul','$kutipan','$isi','$tanggal')";   
            $query = mysqli_query($konek, $sql);
            if($query) {
                $sukses = "Data berhasil ditambahkan";
            } else {
                $error = "Data gagal ditambahkan";
                //die(mysqli_error($konek));
            }
        }
    }
}
?>

<?php
if ($error) {
?>
    <div class="alert alert-danger text-center py-2" role="alert">
        <?= $error ?>
    </div>
<?php 
} 
if ($sukses) {
?>
    <div class="alert alert-success text-center py-2" role="alert">
        <?= $sukses ?>
    </div>
<?php
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="judul" maxlength="25" value="<?= $judul ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Kutipan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="kutipan" maxlength="40" value="<?= $kutipan ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" class="form-control" id="summernote"><?= $isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <div class="col-sm-10">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>

<?php
include 'footer.php';
?>