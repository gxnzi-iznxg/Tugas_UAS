<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggal {

    // Fungsi untuk mengkonversi tanggal dari format YYYY-MM-DD ke DD-MM-YYYY
    public function convert_date_format($date) {
        $date = date_create($date);
        return date_format($date, 'd-m-Y');
    }

    // Fungsi untuk menghitung selisih hari antara dua tanggal
    public function calculate_date_diff($start_date, $end_date) {
        $start_date = date_create($start_date);
        $end_date = date_create($end_date);
        $diff = date_diff($start_date, $end_date);
        return $diff->format("%a hari");
    }

    // Fungsi untuk mendapatkan nama hari dari sebuah tanggal
    public function get_day_name($date) {
        $days = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        $day_number = date('w', strtotime($date));
        return $days[$day_number];
    }
}
?>
