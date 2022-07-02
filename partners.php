<?php
include_once './config/koneksi.php';
include_once './config/function.php';

$id = getId();

$sql = "SELECT * FROM partners WHERE id = '$id' ";
$query = mysqli_query($konek, $sql);
$jumlah = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

$name = $result['nama'];
?>

<?php include_once 'header.php'; ?>

<?php
if ($name == '') {
    echo "<div>
            <p>Data tidak ditemukan</p>
        </div>";
} else {
?>
    <style>
        .lokasi_foto {
            float: left;
            width: 20%;
            margin-top: 20px;
        }
        .lokasi_foto img {
            width: 100%;
            border-radius: 50%;
        }
        .lokasi_deskripsi {
            float: right;
            width: 75%;
            margin-top: 20px;
        }
    </style>
    <div class="lokasi_foto">
        <img src="<?= urlDasar()."/img/".partnersPict($result['id']) ?>"/>
    </div>
    <div class="lokasi_deskripsi">
        <h1><?= $result['nama'] ?></h1>
        <?= setIsi($result['isi']) ?>
    </div>
    <!-- menghilangkan float -->
    <br style="clear: both;"> 
<?php
}
?>

<?php include_once 'footer.php'; ?>