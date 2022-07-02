<?php include 'header.php'; ?>

<h2 class="py-3">Partners Input Data</h2>

<div class="mb-3 row">
    <a href="partners.php">Kembali</a>
</div>

<?php
$nama = "";
$isi = "";
$foto = "";
$nama_foto = "";

$error = "";
$sukses = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql = "SELECT * FROM partners WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);

    $nama = $result['nama'];
    $isi = $result['isi'];
    $foto = $result['foto'];

    if ($isi == "") {
        $error = "Data tidak ditemukan";
    }

}

if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama'];
    $isi  = $_POST['isi'];
    $tanggal= date("Y-m-d h:i:s");
    
    if ($nama == '' || $isi == '') {
        $error = "Nama dan Isi tidak boleh kosong";
    }
    
    // print_r($_FILES);
    // Array ( [foto] => Array ( [name] => americ.jpg [type] => image/jpeg [tmp_name] => C:\Users\Reza\AppData\Local\Temp\php1B08.tmp [error] => 0 [size] => 8001 ) )

    if ($_FILES['foto']['name']) {
        $nama_foto = $_FILES['foto']['name']; //!  Menyimpan nama file yg diupload
        $file = $_FILES['foto']['tmp_name'];

        //* Detail dari file
        $detail = pathinfo($nama_foto);
        $ext = $detail['extension'];
        //Array ( [dirname] => . [basename] => christian-dubovan-Y_x747Yshlw-unsplash.jpg [extension] => jpg [filename] => christian-dubovan-Y_x747Yshlw-unsplash )
        $valid_ext = ['jpg','jpeg','png','gif'];
        if (!in_array($ext, $valid_ext)) {
            $error = "Hanya boleh file jpg, jpeg, png, gif";
        }
    }

    if (empty($error)) {
        //?  ketika ada yg upload foto
        if ($nama_foto) {
            $direktori = "../img";

            // @ untuk menghilangkan warning
            @unlink($direktori."/$foto"); //?  Menghapus foto di direktori

            $nama_foto = "turors_".time()."_".$nama_foto; // format nama yg disimpan
            //!  Memindahkan file ke $direktori
            move_uploaded_file($file, $direktori."/".$nama_foto);

            $foto = $nama_foto; // ketika edit, foto yg diupload akan ditampilkan form
        } else {
            $nama_foto = $foto;
        }

        if ($id != "") {
            $sql = "UPDATE partners 
                        SET 
                        nama = '$nama',
                        foto = '$nama_foto',
                        isi = '$isi',
                        created_at = now()
                        WHERE
                        id = '$id'
                    ";
            $query = mysqli_query($konek, $sql);
            if($query) {
                $sukses = "Data <b>berhasil</b> diedit";
            } else {
                $error = "Data <b>gagal</b> diedit";
                //die(mysqli_error($konek));
            }
        } else {
            $sql = "INSERT INTO partners (nama, foto, isi, created_at)
                                VALUES 
                                ('$nama','$nama_foto','$isi','$tanggal')";   
            $query = mysqli_query($konek, $sql);
            if($query) {
                $sukses = "Data <b>berhasil</b> ditambahkan";
            } else {
                die(mysqli_error($konek));
                $error = "Data <b>gagal</b> ditambahkan";
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

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" maxlength="25" value="<?= $nama ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <?php
            // jika ada foto
            if ($foto) {
                echo "<img src='../img/$foto' style='max-height:100px;max-width:100px'/>";
            }
            ?>
            <input type="file" class="form-control" name="foto">
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