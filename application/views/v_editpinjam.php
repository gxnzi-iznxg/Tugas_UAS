<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat CRUD dengan Codeigniter</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" />
</head>
<body>
    <center>
        <h1>Edit Peminjam
        </h1>
    </center>

    <form action="<?php echo base_url(). 'pinjam/update'; ?>" method="post">
        <table id="inputbuku">
            <tr>
                <td>ID Peminjam</td>
                <td><input type="text" name="id_peminjam" value="<?php echo $user->id_peminjam ?>" readonly style="background-color: #d3d3d3;">
                </td>
            </tr>
            <tr>
                <td>Nama Peminjam</td>
                <td><input type="text" name="nama_buku" value="<?php echo $user->nama_buku ?>"></td>
            </tr>
            <tr>
                <td>Nomer Telepon (+62)</td>
                <td><input type="text" name="no_telp" value="<?php echo $user->no_telp ?>"></td>
            </tr>
            <tr>
                <td>Nama Buku</td>
                <td><input type="text" name="nama_buku" value="<?php echo $user->nama_buku ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Peminjaman</td>
                <td><input type="text" name="tgl_pinjam" value="<?php echo $user->tgl_pinjam ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td><input type="text" name="tgl_kembali" value="<?php echo $user->tgl_kembali ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>