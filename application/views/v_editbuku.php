<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" />
</head>
<body>
    <center>
        <h1>Edit Data Buku</h1>
    </center>

    <form action="<?php echo base_url(). 'buku/update'; ?>" method="post" enctype="multipart/form-data">
        <table id="inputbuku">
            <tr>
                <td>ID Buku</td>
                <td><input type="text" name="id_buku" value="<?php echo $user->id_buku ?>" readonly style="background-color: #d3d3d3;">
                </td>
            </tr>
            <tr>
                <td>Nama Buku</td>
                <td><input type="text" name="nama_buku" value="<?php echo $user->nama_buku ?>"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang" value="<?php echo $user->pengarang ?>"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit" value="<?php echo $user->penerbit ?>"></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td><input type="text" name="genre" value="<?php echo $user->genre ?>"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahun_terbit" value="<?php echo $user->tahun_terbit ?>"></td>
            </tr>
            <tr>
                <td>Gambar Sampul</td>
                <td>
                    <input type="file" name="cover_image">
                    <input type="hidden" name="existing_cover_image" value="<?php echo $user->sampul_buku; ?>">
                    <?php if($user->sampul_buku): ?>
                        <img src="<?php echo base_url($user->sampul_buku); ?>" alt="Cover Image" width="100">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
