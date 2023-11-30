<?php
// Koneksi ke database (gantilah dengan informasi koneksi sesuai dengan database Anda)
$host = 'localhost';
$user = 'username';
$password = '';
$database = 'sepak_bola';

$koneksi = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil nilai pencarian dari request GET
$searchTerm = $_GET['search'];

// Query pencarian data
$sql = "SELECT * FROM pemain WHERE 
        nama LIKE '%$searchTerm%' OR
        negara_asal LIKE '%$searchTerm%' OR
        posisi LIKE '%$searchTerm%' OR
        nomor_punggung LIKE '%$searchTerm%'";

$result = $koneksi->query($sql);

// Tampilkan hasil pencarian
if ($result->num_rows > 0) {
    echo '<table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Negara Asal</th>
                <th>Posisi</th>
                <th>Nomor Punggung</th>
            </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['nama'] . '</td>
                <td>' . $row['negara_asal'] . '</td>
                <td>' . $row['posisi'] . '</td>
                <td>' . $row['nomor_punggung'] . '</td>
            </tr>';
    }
    echo '</table>';
} else {
    echo 'Tidak ada hasil ditemukan.';
}

// Tutup koneksi database
$koneksi->close();
?>
