<?php
include 'header.php';

$sukses = "";
$per_page = 5;

$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $tampil = "DELETE FROM info WHERE id = '$id'";
    $data = mysqli_query($konek, $tampil);
    if ($data) {
        $sukses = "Data <b>berhasil</b> dihapus";
    }

}
?>
<h1 class="py-3">Info Admin</h1>
<p>
    <a href="info_input.php">
        <input type="button" value="Tambah Info" class="btn btn-primary">
    </a>
</p>

<?php
if ($sukses) {
?>
    <div class="alert alert-success text-center py-2" role="alert">
        <?= $sukses ?>
    </div>
<?php } ?>

<form method="get" class="row g-3">
    <div class="col-auto">
        <input type="text" name="katakunci" class="form-control" value="<?= $katakunci ?>" placeholder="masukkan kata kunci">
    </div>
    <div class="col-auto">
        <input type="submit" value="Cari Tulisan" class="btn btn-secondary" name="cari">
    </div>
</form>

<table class="table table-striped mt-4">
    <thead>
        <th>No</th>
        <th>Judul</th>
        <th class="col-2">Aksi</th>
    </thead>
    <tbody>
        <?php
        $tambahan = "";
        if ($katakunci != '') {
            $array_katakunci = explode(" ", $katakunci);
            // pecah jadi beberapa kata. count() untuk cari jumlah kata yg diinput
            for ($x = 0 ; $x < count($array_katakunci) ; $x++) { 
                $cari[] = "(judul LIKE '%" . $array_katakunci[$x] . "%' OR isi LIKE '%" . $array_katakunci[$x] . "%')";
            }
            $tambahan = " WHERE ".implode(" OR ", $cari);
        }
        $tampil = "SELECT * FROM info $tambahan";  //? Perintah untuk search
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; //!  Merubah data jadi integer
        $mulai = ($page > 1) ? ($page * $per_page) - $per_page : 0; // kalo page>1, buat jadi max per_page
        $data = mysqli_query($konek, $tampil);
        $total = mysqli_num_rows($data);
        $pages = ceil($total / $per_page);
        $no = $mulai + 1;
        $tampil = $tampil." ORDER BY id DESC LIMIT $mulai, $per_page";

        $data = mysqli_query($konek, "$tampil");
        while($result = mysqli_fetch_array($data)) :
        ?>
            <tr>
                <td width='50px' align='center'><?= $no++?></td>
                <td><?= $result['judul']?></td>
                <td>
                    <a href="info_input.php?id=<?= $result['id']?>">
                        <span class="badge bg-warning text-dark">Edit</span>
                    </a>
                    <a href="info.php?op=delete&id=<?= $result['id']?>" onclick=" return confirm('Yakin ingin dihapus ?')">
                        <span class="badge bg-danger">Delete</span>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<nav aria_label="Page navigation exaple">
    <ul class="pagination">
        <?php
        $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";
        for ($i=1; $i <= $pages; $i++) { 
        ?>
            <li class="page-item">
                <a href="info.php?katakunci=<?= $katakunci ?>&cari=<?= $cari ?>&page=<?= $i ?>" class="page-link">
                    <?= $i ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>

<?php
include 'footer.php';
?>