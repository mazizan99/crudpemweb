<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    
    $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
    $fakultas = isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
    $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';
    
    $stmt = $pdo->prepare('INSERT INTO mahasiswa VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nim, $nama, $email, $jurusan, $fakultas, $gambar]);
    $msg = 'Created Successfully!';
}

?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Buat Kontak</h2>
    <form action="create.php" method="post">
    <label for="nim">Nim</label>
        <input type="text" name="nim" class="form-control" placeholder="Input nim anda disini!" required>

        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Input nama anda disini!" required>

        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Input email anda disini!" required>

        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" placeholder="Input jurusan anda disini!" required>

        <label for="fakultas">Fakultas</label>
        <input type="text" name="fakultas" class="form-control" placeholder="Input fakultas anda disini!" required>

        <label for="gambar">Gambar</label>
        <input type="text" name="gambar" class="form-control" placeholder="Input gambar anda disini!" required>

        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>