<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" />
</head>
<body>
    
<center>
    <h1>TAMBAH BUKU</h1>
</center>
<form action="<?php echo base_url(). 'buku/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
    <table id="inputbuku">
        <tr>
            <td>Id Buku</td>
            <td><input type="text" name="id_buku" <?php echo form_error('id_buku'); ?>></td>
        </tr>
        <tr>
            <td>Nama Buku</td>
            <td><input type="text" name="nama_buku" <?php echo form_error('nama_buku'); ?>></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td><input type="text" name="pengarang"<?php echo form_error('pengarang'); ?>></td>
        </tr>
        <tr>
            <td>Penerbit</td>
            <td><input type="text" name="penerbit" <?php echo form_error('penerbit'); ?>></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td><input type="text" name="genre" <?php echo form_error('genre'); ?>></td>
        </tr>
        <tr>
            <td>Tahun Terbit</td>
            <td><input type="text" name="tahun_terbit" <?php echo form_error('tahun_terbit'); ?>></td>
        </tr>
        <tr>
            <td>Gambar Sampul</td>
            <td><input type="file" name="sampul_buku"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Tambah"></td>
        </tr>
    </table>
</form>
</body>
</html>
