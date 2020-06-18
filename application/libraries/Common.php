<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common
{
    public function getAdminData()
    {
      $this->CI =& get_instance();
      $this->CI->load->model('admin_model');
      $admin = $this->CI->admin_model;
      $id = $this->CI->session->userdata('admin_id');
      $data = $admin->getById($id);
      if ($data != null) {
        return $data;
      }
      else {
          redirect(site_url('login/logout'));
      }
    }

    function tanggalIndonesia($date)
    { // fungsi atau method untuk mengubah tanggal ke format indonesia
      // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
       $BulanIndo = array("Januari", "Februari", "Maret",
                  "April", "Mei", "Juni",
                  "Juli", "Agustus", "September",
                  "Oktober", "November", "Desember");
     
       $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
       $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
       $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
       
       $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
  
       $day = date('D', strtotime($date));
       $dayList = array(
         'Sun' => 'Minggu',
         'Mon' => 'Senin',
         'Tue' => 'Selasa',
         'Wed' => 'Rabu',
         'Thu' => 'Kamis',
         'Fri' => 'Jumat',
         'Sat' => 'Sabtu'
        );
        
        $result = $dayList[$day].", ".$result;
  
       return($result);
    }
}