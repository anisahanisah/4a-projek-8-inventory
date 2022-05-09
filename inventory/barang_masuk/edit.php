<?php
include "../koneksi.php";
require_once "session.php";

$id_masuk=$_GET['id_masuk'];
$query=mysqli_query ($koneksi," SELECT * FROM barang_masuk WHERE id_masuk='$id_masuk'");
$r=mysqli_fetch_array($query);
if(isset($_POST['edit'])){
    $id_barang = $_POST['id_barang'];
    $id_admin = $rowSession['id_admin'];
    $nama_admin = $rowSession['nama_admin'];
    $jumlah=$_POST['jumlah'];
    $sql=mysqli_query ($koneksi,"UPDATE barang_masuk SET id_barang='$id_barang', id_admin='$id_admin', nama_admin='$nama_admin', jumlah='$jumlah'  WHERE id_masuk='$id_masuk'" ) or die($koneksi);
    if ($sql){
        echo"
            <script> 
            alert('Data Berhasil diedit!');
            document.location.href='index.php';
            </script>
        ";
    } else{
        echo"
        <script> 
        alert('Data Gagal diedit!');
        document.location.href='create.php';
        </script>
    "; 
    }
}
?>

<?php include "sidebar.php" ?>
<h2>Edit Data Barang Masuk</h2>
        <div class="col">
            <div class="row mt-5">
                <form class="form-input" method="POST">
                    <div class="form-group mb-3">
                        <label for="id_barang" class="form-label">ID Barang</label>
                        <input type="text" class="form-control" value="<?php echo $r['id_barang'] ?>" name="id_barang" id="id_barang" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_admin" class="form-label">ID Admin</label>
                        <input type="text" class="form-control" value="<?php echo $rowSession['id_admin'] ?>" name="id_admin" id="id_admin" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_admin" class="form-label">Nama Admin</label>
                        <input type="text" class="form-control" value="<?php echo $rowSession['nama_admin'] ?>" name="nama_admin" id="nama_admin" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" value="<?php echo $r['jumlah']?>"  class="form-control" >
                        </div>
                    <a href="index.php" button type="button" class="btn btn-primary"><i class="bi bi-chevron-left"></i> Kembali</a>  
                    <button type="submit" class="btn btn-success" name="edit" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-file-earmark-plus"></i> Simpan</button>    
                </form>                                     
                </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
