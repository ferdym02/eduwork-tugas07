<?php
include "koneksi.php";

// Deklarasi variabel
$nama = "";
$harga = "";
$deskripsi = "";
$pesan = "";

// Cek apakah tombol submit ditekan
if (isset($_POST['submit'])) {

    // Ambil data dari form
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Validasi sederhana (tidak boleh kosong)
    if ($nama == "" || $harga == "" || $deskripsi == "") {
        $pesan = "Semua field harus diisi!";
    }
    // Validasi harga harus angka
    elseif (!is_numeric($harga)) {
        $pesan = "Harga harus berupa angka!";
    }
    else {

        // Query insert
        $query = "INSERT INTO products (nama_produk, harga, deskripsi)
                  VALUES ('$nama', '$harga', '$deskripsi')";

        if (mysqli_query($conn, $query)) {
            $pesan = "Produk berhasil ditambahkan!";

            // Kosongkan kembali input
            $nama = "";
            $harga = "";
            $deskripsi = "";
        } else {
            $pesan = "Gagal menambahkan produk!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>

<h2>Form Tambah Produk</h2>

<!-- Tampilkan pesan -->
<p style="color:red;"><?php echo $pesan; ?></p>

<form method="POST">
    <label>Nama Produk:</label><br>
    <input type="text" name="nama" value="<?php echo $nama; ?>"><br><br>

    <label>Harga:</label><br>
    <input type="text" name="harga" value="<?php echo $harga; ?>"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"><?php echo $deskripsi; ?></textarea><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>

</body>
</html>