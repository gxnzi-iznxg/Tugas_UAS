<center>
    <h1>DATA PINJAM</h1>
</center>

<center>
    <?php echo anchor('pinjam/tambah','Tambah Data'); ?>
</center>
<center>
        <!-- Tampilkan alert berhasil -->
        <?php if ($this->session->flashdata('message')) {
            echo '<div style="color: green;">' .$this->session->flashdata('message').'</div>';
        } ?>

        <!-- Tampilkan alert gagal -->
        <?php if ($this->session->flashdata('error')) {
            echo '<div style="color: red;">' .$this->session->flashdata('error').'</div>';
        } ?>

    </center>
<section>
            <table id="daftarBuku">
                <thead>
                    <tr>
                        <th>ID Peminjam</th>
                        <th>Nama Peminjam</th>
                        <th>No Telepon (+62)</th>
                        <th>Nama Buku</th>
                        <th>Tanggal Meminjam</th>
                        <th>Tanggal Mengembalikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($user as $u){ ?>
                    <tr>
                        <td><?php echo $u->id_peminjam ?></td>
                        <td><?php echo $u->nama_peminjam ?></td>
                        <td><?php echo $u->no_telp ?></td>
                        <td><?php echo $u->nama_buku ?></td>
                        <td><?php echo $u->tgl_pinjam ?></td>
                        <td><?php echo $u->tgl_kembali ?></td>
                        <td>
                            <?php echo anchor('pinjam/edit/'.$u->id_peminjam, 'Edit'); ?>
                            <?php echo anchor('pinjam/hapus/'.$u->id_peminjam, 'Hapus'); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
            </table>

            <div style="text-align: center;">
                <?php echo $links; ?>
            </div>
        </section>