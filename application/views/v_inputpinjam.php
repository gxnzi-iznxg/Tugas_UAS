<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" />
</head>
<body>

<center>
        <h1>TAMBAH PEMINJAM</h1>
</center>
<form action="<?php echo base_url(). 'pinjam/tambah_aksi'; ?>" method="post">
    <table id="inputbuku">
        <tr>
            <td>ID Peminjam</td>
            <td><input type="text" name="id_peminjam"><?php echo form_error('id_peminjam'); ?></td>
        </tr>
        <tr>
            <td>Nama Peminjam</td>
            <td><input type="text" name="nama_peminjam"><?php echo form_error('nama_peminjam'); ?></td>
        </tr>
        <tr>
            <td>No Telepon (+62)</td>
            <td><input type="text" name="no_telp"><?php echo form_error('no_telp'); ?></td>
        </tr>
        <tr>
            <td>Nama BUKU</td>
            <td><input type="text" name="nama_buku"><?php echo form_error('nama_buku'); ?></td>
        </tr>
        <tr>
            <td>Tanggal Peminjaman</td>
            <td><input type="text" name="tgl_pinjam"><?php echo form_error('tgl_pinjam'); ?></td>
        </tr>
        <tr>
            <td>Tanggal Pengembalian</td>
            <td><input type="text" name="tgl_kembali"><?php echo form_error('tgl_kembali'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Tambah"></td>
        </tr>
    </table>
</form>
</body>
</html>
