<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Template Sederhana dengan Codeigniter | Pemrograman Web II | UNIRA Malang </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" />
</head>
<body>
    <div id="wrapper">
        <header>
            <hgroup>
                <h1>UNIRA LIBRARY</h1>
            </hgroup>
            <nav>
                <ul>
                    <li>
                        <a href="<?php echo base_url(). "index.php/pinjam" ?>">Data Peminjaman</a>
                    </li>
                    <li>
                    <a href="<?php echo base_url(). "index.php/buku" ?>">Data Buku</a>
                    </li>
                </ul>
            </nav>
            <div class="clear"></div>
        </header>