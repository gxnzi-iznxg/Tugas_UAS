<center>
    <h1>DATA BUKU</h1>
</center>

<center>
    <?php echo anchor('buku/tambah','Tambah Data'); ?>
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
                        <th>ID Buku</th>
                        <th>Nama Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Genre</th>
                        <th>Tahun Terbit</th>
                        <th>Sampul Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($user as $u){ ?>
                    <tr>
                        <td><?php echo $u->id_buku ?></td>
                        <td><?php echo $u->nama_buku ?></td>
                        <td><?php echo $u->pengarang ?></td>
                        <td><?php echo $u->penerbit ?></td>
                        <td><?php echo $u->genre ?></td>
                        <td><?php echo $u->tahun_terbit ?></td>
                        <td>
                            <?php if ($u->sampul_buku) { ?>
                                <img src="<?php echo base_url($u->sampul_buku); ?>" alt="Sampul Buku" width="100">
                            <?php } else { ?>
                                <p>No Image</p>
                            <?php } ?>
                        </td>
                        <td>
                            <?php echo anchor('buku/edit/'.$u->id_buku, 'Edit'); ?>
                            <?php echo anchor('buku/hapus/'.$u->id_buku, 'Hapus'); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
            </table>

            <div style="text-align: center;">
                <?php echo $links; ?>
            </div>
        </section>

        