    <?php

//memanggil file koneksi.php
require "koneksi.php";

// query Read atau View data pemain
$query = mysqli_query($con, "SELECT * FROM pemain");
$jumlahPemain = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Pemain</title>
    
</head>
<body>
        <nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="index.php" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
      </ul>
    </div>
  </nav>
  <header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Sepak Bola</span>
      </a>

    </div>
  </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col">
        <h3 class=" ms-5">Data Pemain</h3>
            </div>
        </div>
<table border="1" class="table table-striped">
<thead>
<tr>
<th>No</th>
<th>Nama Pemain</th>
<th>Negara Asal</th>
<th>Posisi</th>
<th>No Punggung</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
//pengecekan data jika data kosong
if($jumlahPemain==0){
?>
<tr>
<td colspan=6 class="text-center">Data Kosong</td>
</tr>
<?php
}
else{
//membuat urutan atau no dengan menggunakan increment
$jumlah = 1;
//menampilkan data pemain dalam bentuk tabel menggunakan perulangan(while)
while($data=mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $jumlah; ?></td>
<td><?php echo $data['nama']; ?></td>
<td><?php echo $data['negara_asal']; ?></td>
<td><?php echo $data['posisi']; ?></td>
<td><?php echo $data['no_punggung']; ?></td> 
<td>
<a href="update_pemain.php?id_pemain=<?php echo $data['id_pemain']; ?>" class="btn btn-primary"> Update </a>
<a href="hapus_pemain.php?id_pemain=<?=$data['id_pemain']?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
</td>
</tr>
<?php
//increment untuk mengurutkan no dari 1 sampai terbesar
$jumlah++;
}
}
?>
</tbody>
</table>
<a href="form_pemain.php" class="btn btn-primary mt-4 mb-3">Input Data Pemain</a>

    </div>
<script src="scipt.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</div>
</body>
</html>